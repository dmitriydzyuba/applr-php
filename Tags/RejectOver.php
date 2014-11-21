<?php

namespace Applr\Tags;

class RejectOver extends BasicTag
{
	private $limit;

	protected $_xml = array(
		'tag' => 'reject_over',
		'attributes' => array(
			'limit'
		)
	);

	function __construct($reject_over) {
		$this->_setPropertes($reject_over);
	}

	/**
	 * @param mixed $limit
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * @return mixed
	 */
	public function getLimit() {
		return $this->limit;
	}
}