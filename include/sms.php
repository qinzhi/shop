<?php
require_once ('config/Init.inc.php');
require_once ('Class/HttpClient.class.php');
/**
 * 接口文件
 */
   /**
     * 查余额接口
     *
     */
	function getbalance($u,$p)
	{
		
		 $key = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
		$url = 'http://sms.pica.com:8082/zqhdServer/getbalance.jsp?regcode='.$u.'&pwd='.md5($p).'&key='.$key;
		
		$pageContents = HttpClient::quickGet($url);
	    /*
	     * <response><result>3.9</result></response> 返回结果格式
	     */
		if($pageContents!='')
		{
	     $dom = new DOMDocument();
         $dom->loadXML($pageContents);
         $xml_value = $dom->getElementsByTagName('result');
         $value = $xml_value->item(0);
         
         return $value->nodeValue;
		}else{
			//可能出现不能访问网络
			return 0;
		}
		
	}	
	/**
	 * 发短信接口
	 *
	 */
  function  send($u,$p,$mobile,$content)
  {
 
  	 $key = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$content = mb_convert_encoding($content, "gbk", "UTF-8");	
	
  	$url = 'http://sms.pica.com:8082/zqhdServer/sendSMS.jsp?regcode='.$u.'&pwd='.md5($p).'&phone='.$mobile.'&CONTENT='.urlencode($content).'&extnum=11&level=1&schtime=null&reportflag=1&url=&smstype=0&key='.$key;
	echo "    msm_url:".$url;
  	$pageContents = HttpClient::quickGet($url);
  	
  	
     /*
     * <response><result>3.9</result></response> 返回结果格式
     */
  	if($pageContents!='')
  	{
     $dom = new DOMDocument();
     
        $dom->loadXML($pageContents);
        $xml_value = $dom->getElementsByTagName('result');
        $value = $xml_value->item(0);
        
        return $value->nodeValue;
  	}else{
  		//可能出现不能访问网络
  		return '55';
  	}
  }
  
  	/**
	 * 发短信接口
	 *
	 */
  function  sendmessage($u,$p,$mobile,$content)
  {
 
  	 $key = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$content = mb_convert_encoding($content, "gbk", "UTF-8");	
	
  	$url = 'http://sms.pica.com:8082/zqhdServer/sendSMS.jsp?regcode='.$u.'&pwd='.md5($p).'&phone='.$mobile.'&CONTENT='.urlencode($content).'&extnum=11&level=1&schtime=null&reportflag=1&url=&smstype=0&key='.$key;
	echo "    msm_url:".$url;
  	$pageContents = HttpClient::quickGet($url);
  	
  	
     /*
     * <response><result>3.9</result></response> 返回结果格式
     */
  	if($pageContents!='')
  	{
     $dom = new DOMDocument();
     
        $dom->loadXML($pageContents);
        $xml_value = $dom->getElementsByTagName('result');
        $value = $xml_value->item(0);
        
        return $value->nodeValue;
  	}else{
  		//可能出现不能访问网络
  		return '55';
  	}
  }
  
  
?>