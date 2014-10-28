<?php

namespace Applr\Tags;

class BasicTag
{
	private function _toCamelCase($string) {
		$str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
		return $str;
	}

	protected function getSetterName($property) {
		return 'set' . $this->_toCamelCase($property);
	}

	protected function getAdderName($property) {
		return 'add' . $this->_toCamelCase(substr($property, 0, -1));
	}

	protected function getGetterName($property) {
		return 'get' . $this->_toCamelCase($property);
	}

	public function toXML() {
		$xml = '';

		if (isset($this->_root_tag)) {
			$xml .= '<'.$this->_root_tag.'>';
		}

		foreach ($this->_attributes as $attribute) {
			$getter = $this->getGetterName($attribute);
			if (method_exists($this, $getter)) {
				$value = $this->$getter();
			}

			$xml .= '<'.$attribute.'>';
				$xml .= $value;
			$xml .= '</'.$attribute.'>';
		}

		if (isset($this->_root_tag)) {
			$xml .= '</'.$this->_root_tag.'>';
		}

		return $xml;
	}
}
