<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$config['db'] = array(
    'host' => '127.0.0.1',
    'db' => 'wx_sms',
    'user' => 'root',
    'password' => 'iloveu',
    'charset' => ''
);

$config['shortcode_usm'] = 32666;
$config['shortcode_min'] = 5100;
$config['shortcode_menu_count'] = 0;

define('MAIN_PATH', dirname(__FILE__));
define('TOKEN', '1qazxsw23edcvfr4');

function checkSignature()
{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
	$token = TOKEN;
	$tmpArr = array($token, $timestamp, $nonce);
	sort($tmpArr);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );
	
	if( $tmpStr == $signature ){
		return true;
	}else{
		return false;
	}
}

function __error_log($msg, $path = '', $line = '') {
  $logFile = date('Y-m-d').'_error.txt';
  $logFile = MAIN_PATH.'/log/'.$logFile;
  $msg = $line.':'.basename($path).'('.date('Y-m-d H:i:s').') >>> ' . $msg . "\r\n";
  file_put_contents($logFile, $msg, FILE_APPEND);
}

function __info_log($msg, $path = '', $line = '') {
  $logFile = date('Y-m-d').'_info.txt';
  $logFile = MAIN_PATH.'/log/'.$logFile;
  $msg = $line.':'.basename($path).'('.date('Y-m-d H:i:s').') >>> ' . $msg . "\r\n";
  file_put_contents($logFile, $msg, FILE_APPEND);
}

?>
