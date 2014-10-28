<?php

namespace Applr;

use Applr\Exception;
use Applr\Tags;

class API {

	/**
	 * Debug flag
	 * @var bool
	 */

	private $_debug = false;

	/**
	 * API endpoint base url
	 */

	const API_ENDPOINT = 'http://applr.io/api/';

	/**
	 * API key
	 */

	private $_apiKey;

	/**
	 * cURL handler object
	 */

	private $_ch;

	/**
	 * Job tag
	 */

	public $job;

	function __construct($apiKey) {
		if (!$apiKey) {
			throw new Exception\EmptyApiKeyException('Please provide API key');
		}

		$this->_apiKey = $apiKey;
	}

	public function createJob($job = array()) {
		$this->job = new Tags\Job($job);
	}

	public function postXML($xml) {
		return $this->_makeCall('jobs', null, $xml);
	}

	protected function _getApiKey() {
		return $this->_apiKey;
	}

	protected function _makeCall($method, $params, $data) {
		$apiCall = self::API_ENDPOINT . $method;

		if (!$this->_ch) {
			$this->_ch = curl_init();
		}

		$headerData = array(
			'Accept: application',
			'Authorization: Token token=' . $this->_getApiKey()
		);

		curl_setopt($this->_ch, CURLOPT_URL, $apiCall);
		curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $headerData);
		curl_setopt($this->_ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, true);

		if ($data) {
			curl_setopt($this->_ch, CURLOPT_POST, true);
			curl_setopt($this->_ch, CURLOPT_POSTFIELDS,  array($data));
		}

		if ($this->_debug) {
			$verbose = fopen('php://temp', 'rw+');
			curl_setopt($this->_ch, CURLOPT_STDERR, $verbose);
			curl_setopt($this->_ch, CURLOPT_VERBOSE, true);
		}

		$response = curl_exec($this->_ch);

		$info = curl_getinfo($this->_ch);

		//not good response code
		if (!($info['http_code'] >= 200 && $info['http_code'] < 300)) {
			if ($info['http_code'] == 401) {
				throw new Exception\InvalidApiKeyException($info['http_code'] . ': ' . $response);
			} elseif ($info['http_code'] == 400) {
				throw new Exception\BadRequest($info['http_code'] . ': ' . $response);
			} else {
				throw new Exception\ApiCallException($info['http_code'] . ': ' . $response);
			}
		}

		if ($this->_debug) {
			rewind($verbose);
			$verboseLog = stream_get_contents($verbose);

			echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";
		}

		return $response;
	}
}