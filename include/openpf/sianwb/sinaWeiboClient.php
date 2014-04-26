<?php
require_once '../../../config/Config.inc.php';
header("Content-Type: text/html; charset=utf-8");
//$GLOBALS['THRIFT_ROOT'] = '../../include/Class/thrift';
$GLOBALS['THRIFT_ROOT'] = '../../Class/thrift';

require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/THttpClient.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';

require_once 'sinaThrift_types.php';
require_once 'SinaWeiBoService.php';
	
	global $_CFG;
	$sinaweiip = $_CFG['SinaWeiBo'];

  	$socket = new TSocket('192.168.1.206', 8090);
  	$transport = new TBufferedTransport($socket, 1024, 1024);
  	$protocol = new TBinaryProtocol($transport);
  	$client = new SinaWeiBoServiceClient($protocol);
   
  	$transport->open();
  	 
//  $user_name = 'mackstonechina@gmail.com';
//  $password ='majiayun';
 // $sendMessage = 'php发布微博===开少时诵诗书s';
//  $d = $client->testCase1(10,100,'ttt');
//  $auth = $client->loginWeibo($user_name,$password);

  	/*
  	 * 登录微博
  	 * 
  	 * (登录一次以后，就取得了$authbean 、tokensecret并且把他们放入
  	 * sina_SinaWeiBoAuthBean 类中，下次该用户对微博进行操作时，就不需要
  	 * 再次想weibo官方获取授权码了。)
  	 * 
  	 * @param $user_name	用户名
  	 * @param $password		密码
  	 * 
  	 * return $auth
  	 */
	$auth = $client->loginWeibo($user_name,$password);
	 
	//设置登录后取得的token、tokensecret
 	$authbean = new sina_SinaWeiBoAuthBean();
// 	$authbean = $auth;
 	$authbean->token='1f31d987a0dfdc1f28fc8c6b788e3f3b';
 	$authbean->tokensecret = '85c42b2be373c53b35daa2829ebede90';
 
//
// 	$mack = $authbean->getName();
// 	printf($mack);

 	/**
 	 * 发布一条微博
 	 * @param $message	发表微博的内容
 	 * 返回类: sina_Status
 	 * return $sina_Status
 	 */
 	$timeinfo = time();
 	$str_time = "".$timeinfo."";
 	echo "时间戳是:   ".$str_time;
 	$message = '集体测试咯！'.$str_time;
 	$sina_Status = $client->sendWeiboMessage($authbean,$message,0,0); 
 	
 	$php_sina_Status = new sina_Status();
 	$php_sina_Status = $sina_Status;
 
 	$statid = $php_sina_Status->id;			//获取的发表微博ID
 	$stattext = $php_sina_Status->text;		//获取发表的微博的内容

	$str_time = $php_sina_Status->createdAt;	//获取发表的微博的时间
	echo "发布微博的ID：".$php_sina_Status->id."<br>";
	echo "发布微博的内容：".$php_sina_Status->text."<br>";
	echo "微博发布的时间：".$php_sina_Status->createdAt."<br>";
	

//	$sub_str = $start_time;
 	
 	/**
 	 * 发表带图片的微博
 	 * @param $picMessage	发表图片微博的内容
 	 * @param $picpath		图片路径
 	 * 返回类: sina_Status
 	 * return $sina_Status
 	 */
	$picpath='E://dowloading//070601.JPEG';
 	$picMessage = '发表带图片的微博咯，大家快来看哦！-----集体测试咯'.$str_time;
 	$sina_Status =$client->sendPicMessage($authbean,$picpath,$picMessage,0,0);
 	
	$php_sina_Status = new sina_Status();
 	$php_sina_Status = $sina_Status;
 
 	$statid = $php_sina_Status->id;			//获取的发表微博ID
 	$stattext = $php_sina_Status->text;		//获取发表的微博的内容

	$str_time = $php_sina_Status->createdAt;	//获取发表的微博的时间
 	echo "发布带图片的。。。微博的ID：".$php_sina_Status->id."<br>";
	echo "发布带图片的。。。微博的内容：".$php_sina_Status->text."<br>";
	echo "发布带图片的。。。微博发布的时间：".$php_sina_Status->createdAt."<br>";
	
	
 	/**
 	 * 根据为微博ID查看微博信息
 	 * @param $weiboNoteID	查看微博的微博ID
 	 * 返回类: sina_Status
 	 * return $sina_Status
 	 */
	
 //	$weiboNoteID = 13755923115;
 	$weiboNoteID =$statid;
 	$sina_Status = $client->statusesShow($authbean,$weiboNoteID);

 	$php_sina_Status = new sina_Status();
 	$php_sina_Status = $sina_Status;
 	$statid = $php_sina_Status->id;			//获取的发表微博ID
 	$stattext = $php_sina_Status->text;		//获取发表的微博的内容

	$str_time = $php_sina_Status->createdAt;	//获取发表的微博的时间
	echo "根据ID查看。。。微博的ID：".$php_sina_Status->id."<br>";
	echo "根据ID查看。。。微博的内容：".$php_sina_Status->text."<br>";
	echo "根据ID查看。。。微博发布的时间：".$php_sina_Status->createdAt."<br>";

	/**
	 * 对一条微博信息进行评论(-->对一条微博)
	 * 
	 * return Comment
	 */
	$str_weiboID = $statid;
	
	printf("要评论的微博ID是:  ".$str_weiboID);
	
//	echo "要评论的微博ID是:  ".$str_weiboID;
	$comm = $client->statusesComment($authbean, "MackStone 自己评论微博".$str_time, $str_weiboID, null, 0, 0);		
	$comment = new sina_Comment();
	$comment = $comm;
	//评论ID
	$pinglunID = $comment->id;
	echo "评论后的评论ID是:  ".$pinglunID;
 
 	//转发一条微博
//	$transportWeiboID = "13755923115";
	$transportWeiboID = $statid;
	
	printf("要转发的微博ID是:  ".$transportWeiboID);
	$transportWeiboMessage = "@Mackstone.....转发一条已经发过的微博，没错吧......那我在来转发一次。。-----集体测试咯".$str_time;
	$sina_Status = $client->statusesTranspond($authbean,$transportWeiboID,$transportWeiboMessage,0);
	
	$php_sina_Status = new sina_Status();
 	$php_sina_Status = $sina_Status;
 	$statid = $php_sina_Status->id;			//获取的发表微博ID
 	$stattext = $php_sina_Status->text;		//获取发表的微博的内容

	$str_time = $php_sina_Status->createdAt;	//获取发表的微博的时间
 	echo "转发的。。。。微博的ID：".$php_sina_Status->id."<br>";
	echo "转发的。。。。微博的内容：".$php_sina_Status->text."<br>";
	echo "转发的。。。。微博发布的时间：".$php_sina_Status->createdAt."<br>";
 	

	/**
	 * 返回一条原创微博的最新n条转发微博信息 
	 * 
	 * 
	 * return List<Status> $array
	 */		
	$log_id = "13911389705";
	$info = $client->statusesRepostTimeline($authbean, $log_id, 0, 0, 20, 1);

	$sinaSta = new sina_Status();
	foreach($array as $sinaSta){
		$str_id = $sinaSta->id;
		$str_text = $sinaSta->text;
		
		printf($str_id);
		printf($str_text);
		next($sinaSta);
	}

	
	
//	echo "返回一条原创微博的最新n条转发微博信息 状态：    ".$array;
	
	
	
	/////--------------------------------------------------接口调用-------------------------
	/**
	 * 获取系统推荐的用户
	 * 
	 * 返回类: sina_Status
	 * return List<Status> $array
	 */
	$array = $client->getSysHotUser($authbean,null);
	//打印array数组信息
//	print_r($array);
	//查看数组大小
//	echo count($array);
	
	$sinaSta = new sina_Status();
	$sinaUser = new sina_User();
	
	//循环获取用户信息
	foreach ($array as $sinaUser){
		printf($sinaUser->id."<br/>");
		printf($sinaUser->statusText."<br/>");
	}

	
	/**
	 * 获取用户粉丝列表及及每个粉丝用户最新一条微博 
	 * 
	 * 返回类型：sina_Status 
	 * return List<Status> $array
	 */
	$array = $client->getUserFollowers($authbean,2073967487,0,null,20,1);
	//打印$userinfo数组信息
//	print_r($array);
	
	$sinaUser = new sina_User();
//	//循环获取用户信息
	foreach ($array as $sinaUser){
		printf($sinaUser->id."<br/>");
		printf($sinaUser->statusText."<br/>");
	}
	

	
	/**
	 * 根据用户ID获取用户资料（授权用户)
	 * 
	 * return User $userinfo
	 */
	$userinfo = $client->getUserInfo($authbean, 0, 0, "mackstone");
	//打印$userinfo数组信息
//	print_r($userinfo);
	
	$user = new sina_User();
	foreach ($userinfo as $user){
		printf($user->id."<br/>");
		printf($user->statusText."<br/>");
	}
	
	
	
	
	/*
	 * 获取指定用户发布的微博消息列表 
	 * 
	 * return List<Status>
	 */
	$array = $client->getUserTimeLine($authbean,0,0,"mackstone",0,0,20,1,0,0);	
	//打印array数组信息
//	print_r($array);	
	
	$user = new sina_User();
	foreach ($array as $user){
		printf($user->id."<br/>");
		printf($user->statusText."<br/>");
	}

	
	
	/*
	 *获取@当前用户的微博列表
	 *  
	 * return List<Status>
	 */		
	$array = $client->statuseMentions($authbean, 0, 0, 20, 1);	
//	print_r($array);
	
	$arr_stat = new sina_Status();
	foreach ( $array as $arr_stat){
		printf($arr_stat->id."<br/>");
		printf($arr_stat->text."<br/>");
	}
	
	
	
	/**
	 * 获取当前用户发出的评论
	 * 
	 * return List<Comment> $array
	 */
	
	$array = $client->statusesCommentByMe($authbean, 0, 0, 20, 1);
	
	$arry_comm = new sina_Comment();
//	print_r($array);
	
	foreach ($array as $arry_comm){
		printf($arry_comm->id."<br/>");
		printf($arry_comm->text."<br/>");
	}
	
//$date_str = date_format($php_sina_Status->createdAt,'%Y年%m月%d日%H时%M分%S秒');

	
  $transport->close();

  

  
  
  
?>