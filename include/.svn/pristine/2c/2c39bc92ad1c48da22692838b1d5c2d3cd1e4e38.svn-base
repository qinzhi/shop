<?php

require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/THttpClient.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';

class TopApiThriftHelp {
	
	/**
	 * 
	 */
	function __construct() {
	
	}
	
	
	/**
	 * 获取TOPAPI的Thirft的代理 
	 *
	 * @return unknown
	 */
	public static function getTopApiClient() {
		
		try {
			
			$client = $_REQUEST['topapithrift_client'];
			
			if(  $client == '' ){
				
				global $_CFG;
				$topconfigs = $_CFG['TOP']['Remote'];
				
				$arraycounts = count($topconfigs);
				if( $arraycounts == 1 ){
					$ind = 0;
				}else{
					$ind = rand(0,$arraycounts-1);
				}
				
				$topconfig = $topconfigs[$ind];
				$topApiIp = $topconfig['ip'];
				$topApiPort = $topconfig['port'];
			
				
				$socket = new TSocket($topApiIp, $topApiPort);
				$socket->setRecvTimeout(3000);	
			  	$transport = new TBufferedTransport($socket, 1024, 1024);
			  	$protocol = new TBinaryProtocol($transport);
		  		$client = new topapi_TopApiThriftClient($protocol); 
		  
		  		$_REQUEST['topapithrift_transport'] = $transport;
			  	$_REQUEST['topapithrift_client'] = $client;
				 	
		  		$transport->open();
			  	
			}
		  	
		 
		 
		  	return $client;
			  	
		} catch (TException $tx) {
		  print 'TException: '.$tx->getMessage()."\n";
		}
    }
    
    
/**
	 * 获取TOPAPI的Thirft的代理 
	 *
	 * @return unknown
	 */
	public static function getTopApiClientOut($timeout) {
		
		try {
			
			$client = $_REQUEST['topapithrift_client'];
			
			if(  $client == '' ){
				
				global $_CFG;
				$topconfigs = $_CFG['TOP']['Remote'];
				
				$arraycounts = count($topconfigs);
				if( $arraycounts == 1 ){
					$ind = 0;
				}else{
					$ind = rand(0,$arraycounts-1);
				}
				
				$topconfig = $topconfigs[$ind];
				$topApiIp = $topconfig['ip'];
				$topApiPort = $topconfig['port'];
			
				
				$socket = new TSocket($topApiIp, $topApiPort);
				$socket->setRecvTimeout($timeout);	
			  	$transport = new TBufferedTransport($socket, 1024, 1024);
			  	$protocol = new TBinaryProtocol($transport);
		  		$client = new topapi_TopApiThriftClient($protocol); 
		  
		  		$_REQUEST['topapithrift_transport'] = $transport;
			  	$_REQUEST['topapithrift_client'] = $client;
				 	
		  		$transport->open();
			  	
			}
		  	
		 
		 
		  	return $client;
			  	
		} catch (TException $tx) {
		  print 'TException: '.$tx->getMessage()."\n";
		}
    }
    
    
	/**
	 * 获取TOPAPI的Thirft的代理协议
	 *
	 * @return unknown
	 */
	public static function getTopApiClientProtocol() {
		
		try {
			
			if(   array_key_exists( 'topapithrift_protocol' , $_REQUEST ) ){
				
				$protocol = $_REQUEST['topapithrift_protocol'];
				
			}else{
				
				global $_CFG;
				$topconfigs = $_CFG['TOP']['Remote'];
				
				$arraycounts = count($topconfigs);
				if( $arraycounts == 1 ){
					$ind = 0;
				}else{
					$ind = rand(0,$arraycounts-1);
				}
				
				$topconfig = $topconfigs[$ind];
				$topApiIp = $topconfig['ip'];
				$topApiPort = $topconfig['port'];
			
				
				$socket = new TSocket($topApiIp, $topApiPort);
				$socket->setRecvTimeout(30000);	
			  	$transport = new TBufferedTransport($socket, 1024, 1024);
			  	$protocol = new TBinaryProtocol($transport);
		  		//$client1 = new topapi_TopApiThriftClient($protocol); 
		  
		  		$_REQUEST['topapithrift_transport'] = $transport;
			  	$_REQUEST['topapithrift_protocol'] = $protocol;
				$transport->open();
			  	
			}
		  	
		  	
		  	
		 
		  	return $protocol;
			  	
		} catch (TException $tx) {
		  print 'TException: '.$tx->getMessage()."\n";
		}
    }

    /**
     * 获取TOPAPI的Thirft的代理协议 (增值)
     *
     * @return unknown
     */
    public static function TgetTopApiClientProtocol() {

        try {

            if(   array_key_exists( 'topapithrift_protocol' , $_REQUEST ) ){

                $protocol = $_REQUEST['topapithrift_protocol'];

            }else{

                global $_CFG;
                $topconfig = $_CFG['TOP']['SRemote'];

                /*$arraycounts = count($topconfigs);
                if( $arraycounts == 1 ){
                    $ind = 0;
                }else{
                    $ind = rand(0,$arraycounts-1);
                }

                $topconfig = $topconfigs[$ind];*/
                $topApiIp = $topconfig['ip'];
                $topApiPort = $topconfig['port'];


                $socket = new TSocket($topApiIp, $topApiPort);
                $socket->setRecvTimeout(30000);
                $transport = new TBufferedTransport($socket, 1024, 1024);
                $protocol = new TBinaryProtocol($transport);
                //$client1 = new topapi_TopApiThriftClient($protocol);

                $_REQUEST['topapithrift_transport'] = $transport;
                $_REQUEST['topapithrift_protocol'] = $protocol;
                $transport->open();

            }




            return $protocol;

        } catch (TException $tx) {
            print 'TException: '.$tx->getMessage()."\n";
        }
    }
	
}

?>