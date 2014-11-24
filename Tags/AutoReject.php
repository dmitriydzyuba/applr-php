<?php

namespace Applr\Tags;

class AutoReject extends BasicTag
{
	private $_name;

	protected $_xml = array(
		'tag' => 'auto_reject',
		'attributes' => array(
			'name'
		)
	);

	function __construct($auto_reject) {
		$this->_setPropertes($auto_reject);
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name) {
		$this->_name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->_name;
	}
}