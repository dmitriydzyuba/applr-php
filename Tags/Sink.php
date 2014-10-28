<?php

namespace Applr\Tags;

class Sink extends BasicTag
{
	private $_for = '';

	private $_target = '';

	function __construct($sink) {
		if (isset($sink['for'])) {
			$this->setFor($sink['for']);
		}
		if (isset($sink['target'])) {
			$this->setTarget($sink['target']);
		}
	}

	public function setFor($for) {
		$this->_for = $for;
	}

	public function getFor() {
		return $this->_for;
	}

	public function setTarget($target) {
		$this->_target = $target;
	}

	public function getTarget() {
		return $this->_target;
	}
}
