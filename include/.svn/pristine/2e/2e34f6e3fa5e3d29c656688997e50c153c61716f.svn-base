<?php


class TopAipTransportHooks {
	
	/**
	 * 
	 */
	function __construct() {
	
	}
	
	/**
	 * 关闭Top api Thrift接口的连接
	 */
	function closeTransport(){
		
		$transport = $_REQUEST['topapithrift_transport'];
		if( $transport != '' ){
			if( $transport->isOpen() )
				$transport->close();
		}
		
	}
	
	
}

?>