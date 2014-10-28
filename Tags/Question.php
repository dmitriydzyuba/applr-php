<?php

namespace Applr\Tags;

class Question extends BasicTag
{
	private $_name = '';

	private $_ask;

	private $_style;

	private $_limit;

	private $_answers = array();

	function __construct($question = array()) {
		if (is_array($question) and $question) {
			foreach ($question as $property => $prop_value) {
				switch ($property) {
					case 'name':
					case 'ask':
					case 'style':
					case 'limit':
						$setter = $this->getSetterName($property);
						if (method_exists($this, $setter)) {
							call_user_func(array(&$this, $setter), $prop_value);
						}
						break;
					case 'answers':
						$this->addAnswer($prop_value);
						break;
					default:
						break;
				}
			}
		}
	}

	public function setName($name) {
		$this->_name = $name;
	}

	public function getName() {
		return $this->_name;
	}

	public function setAsk($ask) {
		$this->_ask = $ask;
	}

	public function getAsk() {
		return $this->_ask;
	}

	public function setStyle($style) {
		$this->_style = $style;
	}

	public function getStyle() {
		return $this->_style;
	}

	public function setLimit($limit) {
		$this->_limit = $limit;
	}

	public function getLimit() {
		return $this->_limit;
	}

	public function addAnswer($answer) {
		$this->_answers[] = new Answer($answer);
	}

	public function getAnswers() {
		return $this->_answers;
	}
}
