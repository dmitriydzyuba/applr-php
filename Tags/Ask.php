<?php

namespace Applr\Tags;

class Ask extends BasicTag
{
	private $_ask;

	private $_limit;

	protected $_xml = array(
		'tag' => 'ask',
		'element' => 'ask',
		'attributes' => array('limit')
	);

	function __construct($ask = array()) {
		if (isset($ask['ask'])){
			$this->setAsk($ask['ask']);
		}
		if (isset($ask['limit'])){
			$this->setLimit($ask['limit']);
		}
	}

	public function setAsk($ask) {
		$this->_ask = $ask;
	}

	public function getAsk() {
		return $this->_ask;
	}

	public function setLimit($limit) {
		$this->_limit = $limit;
	}

	public function getLimit() {
		return $this->_limit;
	}
}
