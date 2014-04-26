<?php

require_once (REALPATH.'/config/Init.inc.php');
require_once (REALPATH.'/config/Config.inc.php');

class Nosqlhelp {
	
	/**
	 * 获取redis对象
	 *  	 * $_CFG['redis']['ip']='127.0.0.1';	
			$_CFG['redis']['port']= 21134 ;
	 */
	public static function getredis(){
		
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['port'];
		
		$redis = new Redis();
		//$redis->connect( $ip , $port );
		$redis->pconnect( $ip , $port );
		return $redis;
		
	}
	
	
	public static function getredis4parmT($ip,$port,$timeout){
		
		/* global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['port']; */
		
		$redis = new Redis();
		//$redis->connect( $ip , $port ,$timeout);
		$redis->pconnect( $ip , $port ,$timeout);
		
		return $redis;
		
	}
	
	
	public static function getredis4parm($ip,$port){
		
		/* global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['port']; */
		
		$redis = new Redis();
		//$redis->connect( $ip , $port );
		$redis->pconnect( $ip , $port );
		return $redis;
		
	}
	
	
	/**
	 * 获取MemcacheQ 对象
	 *
		$_CFG['memcacheq']['ip']='127.0.0.1';	
		$_CFG['memcacheq']['port']= 20122 ;
	 * 
	 * @return unknown
	 */
	public static function getmemcacheq(){
		
		
		global $_CFG;
		$ip = $_CFG['memcacheq']['ip'];
		$port = $_CFG['memcacheq']['port'];
		
		
		$memcacheq = new Memcache;
		$memcacheq->connect($ip, $port);
		
		return $memcacheq;
		
	}
	
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $ip
	 * @param unknown_type $port
	 * @return unknown
	 */
	public static function getmemcacheq4Parm($ip,$port){
		
		
		/*  
		 *  global $_CFG;
			$ip = $_CFG['memcacheq']['ip'];
			$port = $_CFG['memcacheq']['port'];
		*/
		
		
		$memcacheq = new Memcache;
		$memcacheq->connect($ip, $port);
		
		return $memcacheq;
		
	}
	
	
	/**
	 * 获取mongodb对象
	 * 
	 *  $_CFG['mongodb']['mongoip']='127.0.0.1:21132';	
		$_CFG['mongodb']['username']='root';
		$_CFG['mongodb']['password']='123456';
	 */
	function getMongoDb(){
		
		global $_CFG;
		$this->mongoip = $_CFG['mongodb']['mongoip'];
		//$this->mongoip = '192.168.10.62:21132';
		$this->username = $_CFG['mongodb']['username'];
		$this->password = $_CFG['mongodb']['password'];
		$database = $_CFG['mongodb']['db'];
		$con = new Mongo("mongodb://{$this->username}:{$this->password}@{$this->mongoip}"); 
  		$db = $con->selectDB($database); // Connect to Database
  		return $db;	  
  		
	 }	
	
	 function getMongoDb4Parm($mongoip,$username,$password,$database){
		
		//global $_CFG;
		/*$this->mongoip = $_CFG['mongodb']['mongoip'];
		//$this->mongoip = '192.168.10.62:21132';
		$this->username = $_CFG['mongodb']['username'];
		$this->password = $_CFG['mongodb']['password'];
		$database = $_CFG['mongodb']['db'];*/
		$con = new Mongo("mongodb://{$username}:{$password}@{$mongoip}"); 
  		$db = $con->selectDB($database); // Connect to Database
  		return $db;	  
  		
	 }	
	 
	 
	 
}

?>