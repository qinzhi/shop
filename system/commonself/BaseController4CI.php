<?php

require_once ('system/libraries/Controller.php');


class BaseController4CI extends Controller {

	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::Controller();
	}
	
	/**
	 * 当采用url查询，并且只有一个参数的时候，通过该方法获取这个参数
	 *
	 * @param unknown_type $parmflag
	 */
	protected  function getUrlParam(){
		return $this->uri->segment(3, 0);
	}
		
	
	public function getDB(){
		
		 global $MyDB;
		 $db = $MyDB;
		 return $db;
		
	}
	
	/*public function getDB($flag){
		
		 global $MyDB;
		 $db = $MyDB;
		 return $db;
		
	}*/

	/**
	 * Enter description here...
	 *
	 */
	public function getRequest(){
		$content = stripcslashes($_POST ['content']);
		$request = json_decode ( $content, true );
		return $request; 
	}

	
	public function getTplPath( $path , $platform ){
			
		
	}
	
	/**
	 * 获取系统IP
	 *
	 * @return unknown
	 */
	function getIP(){
		
		return $_SERVER['REMOTE_ADDR'];
		
	}

	
}

?>