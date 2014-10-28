<?php

namespace Applr\Tags;

class Answer extends BasicTag
{
	private $_answer;

	private $_ans_tag;

	function __construct($answer) {
		if (isset($answer['answer'])) {
			$this->setAnswer($answer['answer']);
		}
		if (isset($answer['ans_tag'])) {
			$this->setAnsTag($answer['ans_tag']);
		}
	}

	private function setAnswer($answer) {
		$this->_answer = $answer;
	}

	private function getAnswer() {
		return $this->_answer;
	}

	private function setAnsTag($_ans_tag) {
		$this->_ans_tag = $_ans_tag;
	}

	private function getAnsTag() {
		return $this->_ans_tag;
	}
}
