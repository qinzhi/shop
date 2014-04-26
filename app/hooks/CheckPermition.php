<?php
//require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH.'/config/Init.inc.php');
require_once(REALPATH.'/include/Class/httpsqs_client.php');
require_once (REALPATH.'/include/Class/util/DateUtil.php');
class CheckPermition {
	
	function __construct() {
	
	}
	
	
	
	function reponse(){
		
		$static_bean = &$_GET['static_bean'];
		
		//log_message('info','发送信息:'.json_encode ( $static_bean ));
		
		//1、判断是否fastcgi
		//runfastcgifinishrequest();
		//2、发送日志
		//$static_bean_str = json_encode($static_bean);
		/*global $_CFG;
		$static_bean_str = json_encode ( $static_bean );
		//log_message('info','发送统计消息：'.$static_bean_str);
		$httpsqs = new httpsqs($_CFG['httpsqs']['ip'], $_CFG['httpsqs']['port'], '', "utf-8");
		if(!empty($httpsqs))
		{
			$httpsqs->put($_CFG['httpsqs']['queue'],urlencode($static_bean_str));
		}else{
			log_message('info','httpsqs服务器无法连接!请检查问题！');
		}
		*/
		
	}
	
	/**
	 * 权限校验
	 *
	 * @return unknown
	 */
	function baseJudgeAdminUserLogin(){
	log_message('info',"0000000000000000000000000000000000000000");
        /*	$RTR =& load_class('Router');
            $fetchclass =  $RTR->fetch_class();
            $method = $RTR->fetch_method();
            $session = $_GET['auth'];
            if($session=='')
            {
                $session = $_POST ['auth'];
            }
            log_message('info',$session);
            if(($fetchclass=='frontdesk'&&($method=='index'||$method=='login'||$method=='login_yz'||$method=='registered'||$method=='up_password'||$method=='sendmsg'||$method=='validation'||$method=='updateyzm'||$method=='yhm_yz'||$method=='dl_yz'||$method=='personal_stores'||$method=='zzxsy'||$method=='goods_detail_page'||$method=='search'
            ||$method=='search_fy'||$method=='px_pric'||$method=='commodity_supply'||$method=='px_commodity'))|| $fetchclass=='akeytaobao'){
                log_message('info',"0000000000000000000000000000000000000000");
                return '';
            }else{
                    $modulestr = $fetchclass.'/'.$method;
                     if(strpos($modulestr, 'rand')!=false||strpos($modulestr, ':')!=false)
                    {
                        //不符合要求的 非法的地址
                        header("Location:".APP_WEB_INDEX_ROOT."/frontdesk/login");
                    }else
                    {
                        //检查session 是否失效
                        $isexts = $this->isExists($session);

                        if($session!=''&&$isexts===true)
                        {
                             $all = $this->getTall($session);
                              $member = $all['nick'];//$this->getTsession($session,'top_session');

                        }
                        if($member != '')
                        {

                        } else{//没有session (失效)
                                  header("Location:".APP_WEB_INDEX_ROOT."/frontdesk/login");
                                   exit;
                        }
                    }
            }*/
	}
	
	
	
	
	/**
	 * 获取session
	 * @param unknown_type $mapname
	 * @param unknown_type $keyname
	 */
	function  getTsession($mapname,$keyname){
	
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
	
	function statics($cmodule){
		
		$datestr = date('YmdHis');
		$sessionid = $_GET['auth']; 
		
		$host = $_SERVER['HTTP_HOST'];
		$pjname = 'zzgd';
		
		if( $host == 'gd.tbmj.net'  )
		  $pjname = 'zzgd';

		if( $host == 'sgd.tbmj.net' )
		  $pjname = 'czzgd';
		  
		
		$static_bean  = array(  'url'=>$_SERVER['HTTP_HOST'],
								'appname'=>$pjname,
								'sessionid'=>$sessionid,
								'useragent'=>$_SERVER["HTTP_USER_AGENT"],
								'token'=>'',
								'module'=>'',	
								'speeds'=>'0',	
								'ip'=>$_SERVER['REMOTE_ADDR'],
								'dates'=>$datestr,
								'usernick'=>'',
								'cmodule'=>$cmodule,
								'referer'=>'0',								
								'newuser'=>'0',
								'openflag'=>'0'
							);
		
		if (isset($_SERVER['HTTP_REFERER'])){				
					$static_bean['referer']=$_SERVER['HTTP_REFERER'];
		}
		
							
		if( $sessionid!='' ){
		
			$pagecountresult = $_COOKIE['pageresult'];
			
			if( $pagecountresult != '' ){
				$page_result_arr = explode(",",$pagecountresult);
				$arr_num = count($page_result_arr);
				
				if(  $arr_num == 3 ){
					$token = $page_result_arr[0];
					$module = $page_result_arr[1];
					$timediff = $page_result_arr[2];	
					
					
					$static_bean['token']=$token;
					$static_bean['module']=$module;
					$static_bean['speeds']=$timediff;		

					
					/*$speed = array(     
										'url'=>'zzgd.tbmj.net',
										'appname'=>'zzgd',
										'sessionid'=>$sessionid,
										'token'=>$token,
										'module'=>$module,
										'speeds'=>$timediff,
										'useragent'=>$_SERVER["HTTP_USER_AGENT"]
									);*/
								
					//$dao = new CommonDao();
					//$dao->saveRow('speedcount',$speed,'');
					
					
				}
				
				setcookie("pageresult", "", time()-3600,'/');
				
			}
		
		}
		
	
		
		$_GET['static_bean'] = $static_bean;
	
	
	
	}
	
	
	function checkpagemodule(){
		
		$pageload = $_COOKIE['pageload'];
		if( $pageload != '' ){
			setcookie("pageload", "", time()-3600,'/');
			$_REQUEST['PAGE_LOAD'] = $pageload;
		}
		
	}
	
	function checkcooking($sessionid){
		
		$pagecountresult = $_COOKIE['pageresult'];
		
		if( $pagecountresult != '' ){
			$page_result_arr = explode(",",$pagecountresult);
			$arr_num = count($page_result_arr);
			if(  $arr_num == 3 ){
				$token = $page_result_arr[0];
				$module = $page_result_arr[1];
				$timediff = $page_result_arr[2];
				
				/**
				 *  url                  varchar(255),
				   appname              varchar(255),
				   sessionid            varchar(255),
				   token                varchar(255),
				   module               varchar(255),
				   speeds               int,
				 */
				$speed = array( 'url'=>'zzgd.tbmj.net',
				'appname'=>'zzgd',
				'sessionid'=>$sessionid,
				'token'=>$token,
				'module'=>$module,
				'speeds'=>$timediff,
				'useragent'=>$_SERVER["HTTP_USER_AGENT"]
								);
								
				$dao = new CommonDao();
				$dao->saveRow('speedcount',$speed,'');
	
				global $_CFG;
				$opterlog = json_encode ( $speed );
				$httpsqs = new httpsqs($_CFG['httpsqs']['ip'], $_CFG['httpsqs']['port'], '', "utf-8");
				if(!empty($httpsqs))
				{
					$httpsqs->put($_CFG['httpsqs']['queue'],urlencode($opterlog));
				}else{
					log_message('info','httpsqs服务器无法连接!请检查问题！');
				}
				
				
			}
			
			setcookie("pageresult", "", time()-3600,'/');
			
			
		}
	}
}


	

?>