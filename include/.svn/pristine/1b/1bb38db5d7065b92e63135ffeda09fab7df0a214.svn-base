<?php


require_once (REALPATH.'/config/Init.inc.php');
require_once(REALPATH.'/include/Class/httpsqs_client.php');



class EshowCommon {
	
	/**
	 * 
	 */
	function __construct() {
		
	//TODO - Insert your code here
	}
	
	
	/**
	 * 发送eshow推送
	 *
	 * @param unknown_type $userid
	 * @param unknown_type $plugid
	 * @param unknown_type $pushcontent
	 * @param unknown_type $pushtitle
	 * @param unknown_type $url
	 * @param unknown_type $plugname
	 */
	static function sendPush( $userid  , $plugid , $pushcontent , $pushtitle , $url , $plugname ,$cmp_id){
		
		global $_CFG;
		$str_temp = substr($_SERVER["PHP_SELF"],1,strlen($_SERVER["PHP_SELF"]));
		$project_path_split =  substr($str_temp,0,strpos($str_temp,'/'));
		
		
		
		if( $_CFG["ProjectName"] == $project_path_split ){
			$ip = '192.168.10.227';
			$port = '22142';
		}else{
			$ip = '192.168.10.173';
			$port = '22143';
		}
		
		//$cmp_id =  $_SESSION['usermember']['cmp_id'];
		//$login_id = $_SESSION['login_manager']['id'];
		
		//$userid = 61;
		//$plugid = 7;
		
		$plug_push = array(							
								'cmp_id'=>$cmp_id,
								'userid'=>$userid,
								'plugid'=>$plugid,
								'loginname'=>'ser2091',
								'createdt'=>'now()',
								'lastopendt'=>'',
								'pushcontent'=>$pushcontent,
								'pushtitle' =>$pushtitle,
								'ifurl'=>'didf',
								'url'=>$url
							);
		
		$dao = new CommonDao4sSelf('','','','');
		$pushid = $dao->saveRow('plug_push',$plug_push,'');
		
		$event_arr = array('plugid'=>$plugid,'plugname'=>$plugname);
		$event_arr_str = json_encode($event_arr);
		
		
		$push_arr = array(
								'cmp_id'=>$cmp_id,
								'plugid'=>$plugid,
								'pushid'=>$pushid,
								'pushtype'=>'1', //0-公共推送 1-单点推送 3-小组推送
								'userid'=>$userid,    //用户编号
								'pushcontent'=>base64_encode($plug_push['pushtitle']), //推送内容
								'pushextd'=>'', //发送类型的扩展数据
								'ifappstore'=>'0', //是否为IOS  0-非appstore   1-appstore
								'pushEvent'=>base64_encode($event_arr_str), //推送事件
								'pushTitle'=>$plugname."提示您有新消息" //发送标题                       
		
							);
		
		$push_arr_str = json_encode( $push_arr );
		
		
		
		
		$queue_name = 'link16pushcmd';
		$httpsqs = new httpsqs( $ip , $port , '' , "utf-8" );
		
		if(!empty($httpsqs))
		{
			log_message( 'info' , '准备写入队列------'.$ip .'  ---------- '.$port );
			$httpsqs->put($queue_name,urlencode($push_arr_str));
			
		}else{
			log_message('info','httpsqs服务器无法连接!请检查问题！');
		}
		
		
		
		
	}
	
	
	/**
	 * 获取ESHOW后台的URL
	 *
	 * @param unknown_type $method
	 * @return unknown
	 */
	static  function geteshowurl ($method){
		
		$url = "http://link16wap.eshowpro.com/clientstat/".$method;
		
		return $url;
		
	}
	
	/**
	 * 获取小秘书的URL
	 *
	 * @param unknown_type $method
	 * @return unknown
	 */
	static  function getsecreurl ($method){
		
		$url = "http://link16wap.eshowpro.com/secretary/".$method;
		
		return $url;
		
	}
	
	/**
	 * 获取小秘书的URL
	 *
	 * @param unknown_type $method
	 * @return unknown
	 */
	static  function getworkorderurl ($method){
		
		$url = "http://link16wap.eshowpro.com/workorderking/".$method;
		
		return $url;
		
	}
	
	

	
}

?>