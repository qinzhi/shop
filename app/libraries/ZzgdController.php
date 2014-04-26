<?php
require_once (REALPATH.'/include/Class/wwPlugController.php');
require_once (REALPATH.'/config/Init.inc.php');
require_once (REALPATH.'/include/Class/Nosqlhelp.php');
require_once(REALPATH.'/include/Class/httpsqs_client.php');
require_once(REALPATH.'/include/Class/HttpClient.class.php');
require_once (REALPATH.'/include/CommonService.php');
class ZzgdController extends wwPlugController {
	
	public function __construct() {
		parent::__construct ();
	
	}

	/**
	 * 页面合成
	 *
	 */
	function  regView($view , $data)
	{
		//$_REQUEST['cleinttype'] = 'phone';  $this->load->view('phone/'.$view,$data);
		//$string = $this->load->view('myfile', '', true);
		$this->load->view($_REQUEST['cleinttype'] .'/'.$view,$data);
	}
    /**
     * 向Metaq 发消息
     * @param $url
     */
    function sendMetaq($queue,$datas)
    {
        $url = METAQ_URL."?queue=".$queue."&datas=".$datas;
        $result =  HttpClient::quickGet($url);
        return $result;
    }
	
	/**
	 * 
	 * 调用端提交给服务器端的统计信息
	 *
	 */
	function getClientinfo(){
		
		$clientinfo = array(
						'clientname'=>'zzgdweb',
						'ip'=>$this->getIP(),
						'speedflag'=>'0'	
							); 
		
		$clientinfo_str = json_encode($clientinfo);
		
		return $clientinfo_str;
							
	}
	/**
	 * 存储session
	 *
	 * @param string $key
	 * @param string $value
	 */
	function setTsession($mapname,$keyname,$value)
	{
	 
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		
		$redis = Nosqlhelp::getredis4parm($ip, $port);		
		$redis->hSet( $mapname , $keyname , $value );		
		//设定生命周期为一天
		$timeout = getSessionTimeout();
		$redis->expireAt( $mapname , $timeout );
	 
	}
	/**
	 * 设置key的有效时长 
	 * @param unknown_type $mapname
	 * @param unknown_type $timeout  如果为空则为默认的时长
	 */
	function setExpireAt($mapname,$timeout)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		if($timeout==''||intval($timeout)==0)
		{
			//设定生命周期为一天
			$timeout = getSessionTimeout();
		}
		$redis->expireAt( $mapname , $timeout );
	}
	
	/**
	 * 获取redis key
	 * @param unknown_type $mapname
	 * @param unknown_type $keyname
	 * @return unknown
	 */
	function  getWWkey($mapname,$keyname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['port'];
	
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$value = $redis->hget($mapname,$keyname);
	
		return $value;
	
	}
	
	/**
	 * 获取session
	 * @param unknown_type $mapname
	 * @param unknown_type $keyname
	 */
	function  getTsession($mapname,$keyname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
	
		$redis = Nosqlhelp::getredis4parm($ip, $port);		
		$value = $redis->hget($mapname,$keyname);
		
		return $value;
		
	}
	
	/**
	 * 取得一个map的所有值
	 */
	function getTall($mapname)
	{
		
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$all  = $redis->hGetAll($mapname);
		return $all;
		
	}
	
	
	/**
	 * 删除一个key
	 * @param unknown_type $auth
	 * @return unknown
	 */
	function delTSession($mapname,$keyname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$result = $redis->hdel($mapname,$keyname);
		
		return $result;
	}
	
	/**
	 * 生成session
	 *
	 * @return string
	 */
	function getSession()
	{
		$skey = "zzgd";
		$date = date("dHis",time());
		$rad =  rand(0,100000);
		$skey = $skey.$date.$rad.'mobil';
		return md5($skey);
	}
	
	
	/**
	 * 获取系统IP
	 *
	 * @return unknown
	 */
	function getIP(){
	
		return $_SERVER['REMOTE_ADDR'];
	
	}
	
	/**
	 * 淘宝签名
	 * @param unknown_type $params
	 * @return string
	 */
	function createSign ($paramArr) {
		// global $appSecret;
		$sign = '';
		ksort($paramArr);
		foreach ($paramArr as $key => $val) {
			if ($key != ''&& $val !='') {
				$sign .= $key.$val;
			}
		}
		$sign.=TOP_Appsign;
		$sign = strtoupper(md5($sign));
		return $sign;
	}
	
	/**
	 * 生成毫秒级的时间戳
	 * @return multitype:
	 */
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		$rand = ((float)$usec + (float)$sec);
		$rand = str_replace(".", '', $rand);
		return $rand;
	}
	/**
	 * jssdk 写入的淘宝 sign
	 */
	function creatTaoSign()
	{
		$app_key = TOP_Appcode;/*填写appkey */
		$secret=TOP_Appsign;/* 填写appkey对应的secret */
		$timestamp=time()."000";
		$message = $secret.'app_key'.$app_key.'timestamp'.$timestamp.$secret;
		$mysign=strtoupper(hash_hmac("md5",$message,$secret));
		setcookie("timestamp",$timestamp);
		setcookie("sign",$mysign);
	}
	
	/**
	 * 发送数据到队列
	 * @param unknown_type $qname 队列名
	 * @param unknown_type $value 数据
	 */
	function sendQ($qname,$data)
	{
		global $_CFG;
		$httpsqs = new httpsqs($_CFG['httpsqs']['guleip'], $_CFG['httpsqs']['guleport'], '', "utf-8");
			log_message('info','队列地址=='.$_CFG['httpsqs']['guleip'].'----------------'.$_CFG['httpsqs']['guleport']);
		if(!empty($httpsqs))
		{	
			$httpsqs->put($qname,$data);
			log_message('info','httpsqs 已发送！');
		}else{
			log_message('info','httpsqs服务器无法连接!请检查问题！');
		}
	}
	
	/**
	 * 发送数据到队列
	 * @param unknown_type $qname 队列名
	 * @param unknown_type $value 数据
	 */
	function sendSQS($ip,$port,$qname,$data)
	{
		global $_CFG;
		$httpsqs = new httpsqs($ip, $port, '', "utf-8");
		if(!empty($httpsqs))
		{
			$httpsqs->put($qname,$data);
			log_message('info','httpsqs 已发送！');
		}else{
			log_message('info','httpsqs服务器无法连接!请检查问题！');
		}
	}
	
	
	/**
	 * api调用错误处理
	 * @param unknown_type $object
	 * @param unknown_type $session
	 */
	function ApiErrorFix($object,$session)
	{
		//{"code":27,"msg":"Invalid session:session-expired","sub_code":"session-expired"}
		if($object->errorinfo!='')
		{
			$optresult = json_decode($object->errorinfo);
			//情况1
			if($optresult->code=='27'&&$optresult->sub_code==('session-expired'||'session-not-exist'))
			{
				//session 失效，须重新授权
				
				  if(strpos($_SERVER["HTTP_USER_AGENT"],"Mac"))
	               {
		            $data['safari'] = 1;
		            log_message("info",'WebView:safari');
	               }
	              else{
		            $data['safari'] = 0;
		            log_message("info",'WebView:chrome');
	               }
	              $source = $this->getTsession($session, 'source');//取得用户来源
	              log_message('info','用户来源:'.$source);
//	              if($source==1)
//	              {//来自单独客户段
		           $urlitem = "https://oauth.taobao.com/authorize?response_type=code&client_id=".TOP_Appcode."&redirect_uri=".AUTH_CALLBACK."&state=".state.$this->microtime_float()."&scope=item&view=wap";
//	              }else{//来自其它(旺旺插件,网页)
//		           //$urlitem = 'http://fuwu.taobao.com/using/serv_using.htm?service_code='.ITEM_CODE.'&rand='.$this->microtime_float();
//		           //$urlitem = urlencode("https://oauth.taobao.com/authorize?response_type=code&client_id=".TOP_Appcode."&redirect_uri=".AUTH_CALLBACK."&state=".state.$this->microtime_float()."&scope=item&view=web");
//		           $urlitem =urlencode( mb_convert_encoding("https://oauth.taobao.com/authorize?response_type=code&client_id=".TOP_Appcode."&redirect_uri=".AUTH_CALLBACK."&state=".state.$this->microtime_float()."&scope=item&view=web",'gbk','utf-8'));
//		           //$urlitem = urlencode("https://oauth.taobao.com/authorize?response_type=code&client_id=".TOP_Appcode."&redirect_uri=".AUTH_CALLBACK."&state=1212&scope=item&view=web");
//	              }
	               $data['urlitem'] = $urlitem;
	
	              log_message('info','重新授权:'.$urlitem);
	              $url =  APP_WEB_INDEX_ROOT.'/trade/tradelist1?auth='.$session.'&rand='.$this->microtime_float();
	              //设置回调的url
	              $this->setTsession('tempurl', $this->getTsession($session, 'nick'), $url);
		
	              $data['auth'] = $session;
	              $data['source'] = $source;
				//  $data['message']='';
				  $this->regView('trade/err',$data);
			}
			//情况2
			
			//情况3
			
		}else{
			
			$this->regView('trade/noerr',$data);
			//echo 'errorinfo数据为空';
		
		}
	}
	
	/**
	 * 存储一个map的值
	 *
	 * @param string $key
	 * @param string $value
	 */
	function setOneKey($mapname,$keyname,$value)
	{
	
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		log_message("info","ip:".$ip);
		log_message("info","port:".$port);
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$redis->hSet( $mapname , $keyname , $value );
	
	}
	/**
	 * 删除一个map的所有值
	 */
	function delAllKey($mapname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
	
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$result = $redis->delete($mapname);
	
		return $result;
	}
	/**
	 * 取得key 的失效时长
	 * @param unknown_type $keyname
	 */
	function  getTTL($keyname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
		
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$ttl = $redis->ttl($keyname);
		return $ttl;
	}
	
	/**
	 * 判断key是否存在。存在 true 不在 false
	 */
	function isExists($keyname)
	{
		global $_CFG;
		$ip = $_CFG['redis']['ip'];
		$port = $_CFG['redis']['app_port'];
	
		$redis = Nosqlhelp::getredis4parm($ip, $port);
		$res = $redis->exists($keyname);
		 
		return $res;
	}
}

?>