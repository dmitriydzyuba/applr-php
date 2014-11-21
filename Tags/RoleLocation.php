<?php

namespace Applr\Tags;

class RoleLocation extends BasicTag
{
	private $_lat;
	private $_lng;

	protected $_xml = array(
		'tag' => 'role_location',
		'elements' => array(
			'lat',
			'lng'
		)
	);

	function __construct($role_location) {
		$this->_setPropertes($role_location);
	}

	/**
	 * @param float $lat
	 */
	public function setLat($lat) {
		$this->_lat = $lat;
	}

	/**
	 * @return float
	 */
	public function getLat() {
		return $this->_lat;
	}

	/**
	 * @param float $lng
	 */
	public function setLng($lng) {
		$this->_lng = $lng;
	}

	/**
	 * @return float
	 */
	public function getLng() {
		return $this->_lng;
	}
}