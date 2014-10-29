<?php

namespace Applr\Tags;

class Label extends BasicTag
{
	private $_label = '';

	private $_name = '';

	protected $_xml = array(
		'tag' => 'label',
		'attributes' => array('name'),
		'element' => 'label'
	);

	function __construct($label) {
		if (isset($label['label'])) {
			$this->setLabel($label['label']);
		}
		if (isset($label['name'])) {
			$this->setName($label['name']);
		}
	}

	public function setLabel($label) {
		$this->_label = $label;
	}

	public function getLabel() {
		return $this->_label;
	}

	public function setName($name) {
		$this->_name = $name;
	}

	public function getName() {
		return $this->_name;
	}
}
