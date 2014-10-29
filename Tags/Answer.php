<?php

namespace Applr\Tags;

class Answer extends BasicTag
{
	private $_answer;

	private $_ans_tag;

	protected $_xml = array(
		'tag' => 'answer',
		'element' => 'answer',
		'attributes' => array('ans_tag')
	);

	function __construct($answer) {
		if (isset($answer['answer'])) {
			$this->setAnswer($answer['answer']);
		}
		if (isset($answer['ans_tag'])) {
			$this->setAnsTag($answer['ans_tag']);
		}
	}

	public function setAnswer($answer) {
		$this->_answer = $answer;
	}

	public function getAnswer() {
		return $this->_answer;
	}

	public function setAnsTag($_ans_tag) {
		$this->_ans_tag = $_ans_tag;
	}

	public function getAnsTag() {
		return $this->_ans_tag;
	}
}
