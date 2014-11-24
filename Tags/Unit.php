<?php

namespace Applr\Tags;

class Unit extends BasicTag
{
	private $_measure;

	protected $_xml = array(
		'tag' => 'unit',
		'attributes' => array(
			'measure'
		)
	);

	function __construct($unit) {
		$this->_setPropertes($unit);
	}

	/**
	 * @param mixed $measure
	 */
	public function setMeasure($measure) {
		$this->_measure = $measure;
	}

	/**
	 * @return mixed
	 */
	public function getMeasure() {
		return $this->_measure;
	}
}