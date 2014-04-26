<?php
/**
 * 
 * 
 * $hook['post_controller_constructor'][] = array(
                                'class'    => 'pagespeed',
                                'function' => 'pagespeedperfix',
                                'filename' => 'pagespeed.php',
                                'filepath' => '../include',
                                'params'   => array()
                                );   
 * 
 * 
 *
 */
class pagespeed {

	
/**
	 * 
	 */
	function __construct() {
		
	//TODO - Insert your code here
	}
	
	
	function  pagespeedperfix(){
		
		$pageload = $_COOKIE['pageload'];
		if( $pageload != '' ){
			setcookie("pageload", "", time()-3600,'/');
			$_REQUEST['PAGE_LOAD'] = $pageload;
		}
	}
	
}

?>