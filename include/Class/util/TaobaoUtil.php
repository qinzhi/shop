<?php
require_once (REALPATH.'/config/Init.inc.php');
class TaobaoUtil{
	
	
	/**
	 * 
	 * 获取旺旺用户编码
	 *
	 * @param unknown_type $username
	 * @return unknown
	 */
	public static function getEdcodeTOUser($username)
	{
		if($username==''||empty($username))
		{
			
		}else{
			
			$touser = base64_encode(mb_convert_encoding($username, "GBk", "UTF-8"));
			//System.out.println(touser);
			$touser = str_replace("+","%2B",$touser);//touser.replace("+", "%2B");
			$touser = str_replace("=", "%3D",$touser);//touser.replace("=", "%3D");
			$touser = str_replace("/", "%2F",$touser);//touser.replace("/", "%2F");
		}
		return $touser;
	}
	/**
	 * 聊天
	 *
	 * @param unknown_type $wapCode
	 * @param unknown_type $username
	 * @return unknown
	 */
	public static function  getWapWW2User($wapCode,$username)
	{
	  $taouser=  TaobaoUtil::getEdcodeTOUser($username);
	  $wwurl = 	wwurl_touser_1.$taouser.'&amp;'.wwurl_touser_2.$wapCode.'&amp;sid='.$wapCode;
	  return $wwurl;
		
	}
}
?>