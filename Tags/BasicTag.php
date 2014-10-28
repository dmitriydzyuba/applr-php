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

	public function toXML() {

	}
}
