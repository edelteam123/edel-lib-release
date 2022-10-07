<?php

use com\apiconnect\Test\CsvTestSuite\Logger;

include("vendor/autoload.php");

new SubscribeFeed();
class SubscribeFeed
{
	private $iniConfig;

	public function __construct()
	{
		$this->iniConfig = parse_ini_file("./test/CsvTestSuite/config.ini");
		$this->feed = new com\apiconnect\Feed($this->iniConfig['AccId'], $this->iniConfig['UserId'], $this->iniConfig['SettingsFilePath']);
		$this->init();
	}
	public function init()
	{
		$cb = array($this, 'CallBackMethod');
		$symbols = explode(',', $this->iniConfig['SubscribeSymbols']);
		$this->feed->subscribe($symbols, $cb, true, true);
	}
	public function CallBackMethod($message)
	{
		Logger::log('Streamer Response  : ' . $message, 'Debug');
		print_r($message);
	}
	public function unsubscribe()
	{
		$cb = array($this, 'CallBackMethod');
		$symbols = explode(',', $this->iniConfig['UnSubscribeSymbols']);
		$this->feed->unsubscribe($symbols, $cb);
	}
}
