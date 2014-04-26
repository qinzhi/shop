<?php

$GLOBALS['THRIFT_ROOT'] = REALPATH.'/include/Class/thrift';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/THttpClient.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';


require_once 'sinaThrift_types.php';
require_once 'SinaWeiBoService.php';


class SinaWbHelp {
	
	function __construct() {
	
	}
	
	/**
	 * 获取sina微博客户端的代理 
	 *
	 * @return unknown
	 */
	public static function getSinaWeiBoClient() {

	global $_CFG;
	$sinaweiip = $_CFG['SinaWeiBoIP'];	
	$sinaweiSocket = $_CFG['SinaWeiBoSocket'];	
		
	$socket = new TSocket($sinaweiip, $sinaweiSocket);
  	$transport = new TBufferedTransport($socket, 1024, 1024);
  	$protocol = new TBinaryProtocol($transport);
  	$client = new SinaWeiBoServiceClient($protocol);
  
  	 $transport->open();
  	 	
  	 return $client;
		
    }
	
	
}

?>