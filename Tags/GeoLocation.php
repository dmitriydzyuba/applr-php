<?php

namespace Applr\Tags;

class GeoLocation extends BasicTag
{
	private $_name = '';
	private $_auto_reject;
	private $_role_location;
	private $_reject_over;
	private $_unit;

	protected $_xml = array(
		'tag' => 'geo_location',
		'attributes' => array(
			'name'
		),
		'elements' => array(
			'auto_reject',
			'role_location',
			'reject_over',
			'unit'
		)
	);

	function __construct($geo_location) {
		$this->_setPropertes($geo_location);
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->_name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->_name;
	}

	public function setAutoReject($auto_reject) {
		$this->_auto_reject = new AutoReject($auto_reject);
	}

	public function getAutoReject() {
		return $this->_auto_reject;
	}

	public function setRoleLocation($role_location) {
		$this->_role_location = new RoleLocation($role_location);
	}

	public function getRoleLocation() {
		return $this->_role_location;
	}

	public function setRejectOver($reject_over) {
		$this->_reject_over = new RejectOver($reject_over);
	}

	public function getRejectOver() {
		return $this->_reject_over;
	}

	public function setUnit($unit) {
		$this->_unit = new Unit($unit);
	}

	public function getUnit() {
		return $this->_unit;
	}
}