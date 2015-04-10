<?php

namespace Applr\Tags;

class Video extends BasicTag
{
    private $_ask = '';

    private $_maxtime = 0;

    protected $_xml = array(
        'tag' => 'video',
        'attributes' => array('maxtime'),
        'element' => 'ask'
    );

    function __construct($video) {
        if (isset($video['ask'])) {
            $this->setAsk($video['ask']);
        }
        if (isset($video['maxtime'])) {
            $this->setMaxtime($video['maxtime']);
        }
    }

    public function setAsk($ask) {
        $this->_ask = $ask;
    }

    public function getAsk() {
        return $this->_ask;
    }

    public function setMaxtime($maxtime) {
        $this->_maxtime = intval($maxtime);
    }

    public function getMaxtime() {
        return $this->_maxtime;
    }
}
