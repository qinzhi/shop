<?php
/**
 */
/* Get the Application real root path. */
$_CFG['RealRootPath'] = dirname(dirname(__FILE__));
define('REAL_ROOT_PATH', $_CFG['RealRootPath']);

if(!file_exists($_CFG['RealRootPath'] . '/config/Config.inc.php'))
{
    die(" <h1>File 'config/Config.inc.php' cannot be found. </h1>");
}

@ini_set("include_path", "." . PATH_SEPARATOR . $_CFG['RealRootPath'] . PATH_SEPARATOR . $_CFG["RealRootPath"] . "/include/" . PATH_SEPARATOR . $_CFG["RealRootPath"] . "/include/Class/" . PATH_SEPARATOR . $_CFG["RealRootPath"] . "/include/Class/PhpMailer");


require(REAL_ROOT_PATH . '/config/Config.inc.php');                   // Config file.
//require(REAL_ROOT_PATH . '/include/Session.inc.php');                  // Session file.
//date_default_timezone_set('asia/beijing');
date_default_timezone_set("Asia/Shanghai");
/* Start session. */
//session_cache_limiter('private, must-revalidate');
//session_start();
header('Cache-control: private');

/* Create the BaseURL of Application system.
 * If the url of Application is wrong, you can specify it by hand, for example: http://www.test.com/Application.
 * Note: No "/" at the end of the url.
 */
if(strtolower($_SERVER["HTTPS"]) == "on")
{
    $ServerProtocol = "https";
    $ServerPort = "";
}
else
{
    $ServerProtocol = "http";
    $ServerPort = $_SERVER["SERVER_PORT"] == "80" ? "":":" . $_SERVER["SERVER_PORT"];
}
/*$_CFG["BasePath"] = eregi_replace("[/\\]{1}$" , "", dirname($_SERVER["SCRIPT_NAME"]));
$_CFG["BasePath"] = eregi_replace("Admin[/\\]{0,1}$" , "", $_CFG["BasePath"]);*/
$_CFG["BaseURL"] = $ServerProtocol . "://" . $_SERVER["SERVER_NAME"] . $ServerPort . $_CFG["BasePath"];
//define(BF_COOKIE_PATH, $_CFG['BasePath'] . '/');

/* Require config, functions and class files. */
require(REAL_ROOT_PATH . '/include/Class/Page.class.php');                  // Page class.
require(REAL_ROOT_PATH . '/include/Class/ADOLite/adodb.inc.php');           // ADO class.
require(REAL_ROOT_PATH . '/include/Class/TemplateLite/class.template.php'); // Smarty class.
//wingfeng add it on 2008-09-16
require(REAL_ROOT_PATH . '/include/CommanDaoFm.php');                        // common DAO 
require(REAL_ROOT_PATH . '/include/CommonService.php');                    // common Servcie                  // project common Servcie
require(REAL_ROOT_PATH . '/include/Class/imagesample.php');   



if(empty($_CFG['UserLang']))       $_CFG['UserLang']  = $_CFG['DefaultLang'];
if(empty($_CFG['UserStyle']))      $_CFG['UserStyle'] = $_CFG['DefaultStyle'];
if(empty($_CFG['UserLang']))       $_CFG['UserLang']  = $_CFG['DefaultLang'];

/* include the Language file, send heard info. */
if($_CFG['UserLang'] == '')$_CFG['UserLang'] = $_CFG['DefaultLang'];
$LangCommon = $_CFG['RealRootPath'] . '/source/Lang/' . $_CFG['UserLang'] . '/_COMMON.php';
if(file_exists($LangCommon)) require($LangCommon);
$LangPinYin = $_CFG['RealRootPath'] . '/source/Lang/' . $_CFG['UserLang'] . '/PinYin.php';
if(file_exists($LangPinYin)) require($LangPinYin);

@header("Content-Type: text/html; charset=".$_LANG["Charset"]);

/* Connect to Application database server and return the global DB handler -- $MyDB which is used anywhere and set the FETCH_MODE to ASSOC. */

/*
 * 
 * This file private some database acess method
 * 
 * Created on 2008-7-16
 *
 */
 
/**
 * close the db
 */ 
function sysCloseDB()
{
    global $MyDB, $MyUserDB, $_CFG;
    if( !empty($MyDB)){
	    $MyDB->Close();
	    if(!empty($_CFG['UserDB']))
	    {
	        $MyUserDB->Close();
	    }
    }
    

    global  $mydbpools;
    if( !empty($mydbpools)){
    
    	foreach ( $mydbpools as $key =>$value){
    		if( !empty($key) && !empty($value)){
    			$value->Close();
    		}
    	}
    
    }
    
}

$mydbpools = array();

$MyDB = &ADONewConnection('mysql', 'pear');
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
/*$DBResult = $MyDB->Connect($_CFG['DB']['Host'], $_CFG['DB']['User'], $_CFG['DB']['Password'], $_CFG['DB']['Database']);


$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$MyDB->debug_console = true;
if(version_compare(@mysql_get_server_info(), '4.1.0', '>=')){$_CFG['Mysql4.1.0Plus'] = true;}
if($_CFG['DBCharset'] != '' && $_CFG['Mysql4.1.0Plus'])
{
    $MyDB->Query("SET NAMES {$_CFG['DBCharset']}");
}
*/
/* Connect to validating database if it's different from Application database and return the global DB handler --$MyUserDB. */
/*if(!empty($_CFG['UserDB']))
{
    $MyUserDB = &ADONewConnection('mysql', 'pear');
    $MyUserDB->NConnect($_CFG['UserDB']['Host'], $_CFG['UserDB']['User'], $_CFG['UserDB']['Password'], $_CFG['UserDB']['Database']);
    if($_CFG['DBCharset'] == 'UTF8')
    {
        $MyUserDB->Query("SET NAMES UTF8");
    }
}*/
register_shutdown_function('sysCloseDB');

/* Turn off the runtime magic_quotes feature. */
//ini_set('magic_quotes_runtime', 0);

/* Init template class. */
/*$TPL = new Template_Lite;
$TPL->template_dir = $_CFG['TemplateDir'];
$TPL->compile_dir  = $_CFG['TPLCompileDir'];*/
//$TPL->debugging = true;

/* Add slashes to REQUEST, GET, POST, COOKIE, FILES vars. */
if(!get_magic_quotes_gpc())
{
    $_REQUEST = sysAddSlash($_REQUEST);
    $_GET     = sysAddSlash($_GET);
    $_POST    = sysAddSlash($_POST);
    //$_COOKIE  = sysAddSlash($_COOKIE);
    //$_FILES   = sysAddSlash($_FILES);
}

if($_SERVER["SERVER_NAME"] != '')
{
    $_CFG['BrowserMode'] = true;

}


/* 
 * 褰撶郴缁熶负CI妗嗘灦鐨勬椂鍊欓渶瑕佸姞鍏ヤ互涓嬩竴浜涢厤缃紝浣緾I绯荤粺鐨勪娇鐢ㄦ洿鍔犵伒娲�
 * wingfeng add it on 2010-03-18
 */
$_CFG["ProjectName"] = 'shop';
define('PROJECT_NAME',$_CFG["ProjectName"]);
$str_temp = substr($_SERVER["PHP_SELF"],1,strlen($_SERVER["PHP_SELF"]));
$project_path_split =  substr($str_temp,0,strpos($str_temp,'/'));

if( $_CFG["ProjectName"] == $project_path_split ){	
	define('HTTP_DOCMENT_ROOT',$ServerProtocol."://".$_SERVER['HTTP_HOST'].'/'.$_CFG["ProjectName"]);
}else{
	define('HTTP_DOCMENT_ROOT',$ServerProtocol."://".$_SERVER['HTTP_HOST'].'');
}

//娴嬭瘯URL 姝ｅ紡鐜涓嬫敞閲婃帀
//define('HTTP_DOCMENT_ROOT',$ServerProtocol."://".$_SERVER['HTTP_HOST'].'/'.$_CFG["ProjectName"]);


define('IMAGE_ROOT',HTTP_DOCMENT_ROOT.'/source/qn/images');
define('JS_ROOT',HTTP_DOCMENT_ROOT.'/source/fengxiao/js');
define('CSS_ROOT',HTTP_DOCMENT_ROOT.'/source/fengxiao/css');
define('SOURCE_ROOT',HTTP_DOCMENT_ROOT.'/source');
define('PIC_ROOT',HTTP_DOCMENT_ROOT.'/source/pic');

define('ZZ_CSS_FILE',HTTP_DOCMENT_ROOT.'/source/jqm/css/jquery.mobile-1.3.0.min.css');
define('ZZ_JS_FILE',HTTP_DOCMENT_ROOT.'/source/jqm/js/jqmobile.js');
define('GZT_MOBILE_JS',HTTP_DOCMENT_ROOT.'/source/jqm/js/sdk-mobile.js');

define('JQUERY_MOBILE_ROOT',HTTP_DOCMENT_ROOT.'/source/jqm');

define('ZZ_IMAGE_ROOT',HTTP_DOCMENT_ROOT.'/source/zzgd/images');
define('ZZ_JS_ROOT',HTTP_DOCMENT_ROOT.'/source/zzgd/js');
define('ZZ_CSS_ROOT',HTTP_DOCMENT_ROOT.'/source/zzgd/css');
define('ZZ_MANIFEST_ROOT',HTTP_DOCMENT_ROOT.'/source/zzgd/html5');
//define('ZZ_CSS_FILE',HTTP_DOCMENT_ROOT.'/source/jqm/css/jquery.mobile-1.2.0.min_7.css');
//define('ZZ_JS_FILE','http://min.tbmj.net/min/?f=gd/js/jquery-1.8.2.min.js,gd/js/jquery.mobile-1.2.0.min.js,gd/js/Util.js,gd/js/jquery.flot.js');
//define('ZZ_JS_FILE','http://min.tbmj.net/gd/js/jmobile.js');
//define('ZZ_JS_FILE',HTTP_DOCMENT_ROOT.'/source/jqm/js/jmobile.js');

parse_str($_SERVER['QUERY_STRING'],$_GET); 

//褰撲娇鐢–I绯荤粺鏃跺畾浣嶏紝瀹氫箟http鍒癷ndex涔嬮棿鐨剈rl
/*if( strpos(PHP_OS,'WINNT')===false && strpos($_SERVER['HTTP_HOST'],'192.168.9.86')===false)
	define('APP_WEB_INDEX_ROOT',HTTP_DOCMENT_ROOT);//linux鏈哄櫒
else	*/
    define('APP_WEB_INDEX_ROOT',HTTP_DOCMENT_ROOT.'/index.php');//windows鏈哄櫒鎴栨湰鍦版祴璇曟満鍣�

/**
 *top 
 */



/**
 * 
 */
/*
define('A_TOP_Appcode','1012652508'); 
define('A_TOP_Appsign','sandboxc10996be39d2c54de6e5696b8');
define('A_TOP_Session','6100f1379203aadd8e3b5144c2f2534e697d644f9ac1d7b2074082786');*/




 //娴嬭瘯code
 /* define('TOP_Appcode','12652508'); 
define('TOP_Appsign','882af9fc10996be39d2c54de6e5696b8');
define('AUTH_CALLBACK','http://nearmobile.org:8022/zzgdweb/index.php/c/authbackcall');  */
 
/**
 * 鐖辩敤浜ゆ槗
 */
define('TOP_Appcode_Trade','21529835');
define('TOP_Appsign_Trade','1eeaf97d24a423f887c1cf9a307ba901');
define('AUTH_CALLBACK_Trade',HTTP_DOCMENT_ROOT.'/tc/trades');

define('ITEM_CODE','ts-1801030');//璁㈣喘浠ｇ爜ts-1801030

/**
 *Metaq
 */
define('METAQ_URL','http://192.168.10.164:22324/metaq/producer'); //Metaq 鏈嶅姟鍣ㄥ湴鍧�
define('METAQ_PUBLIC_QUEUE','publicqueue');//Metaq 鍏叡闃熷垪
/**
 *
 */
define('GLUE_URL_ROOT','http://192.168.10.241'); //鍚庡彴鏈嶅姟鍣ㄥ湴鍧�

//define('GLUE_URL_ROOT','http://192.168.10.86/zzgdglue/index.php'); //娴嬭瘯鍚庡彴鏈嶅姟鍣ㄥ湴鍧�
define('GULE_QEUE_NAME','pcgdzzccansyopt');//杞彂鏈嶅姟鍣ㄩ槦鍒楀悕
define('PLXG_QEUE_NAME','zzgdplxgansyopt');//鎵归噺淇敼杞彂鏈嶅姟鍣ㄩ槦鍒楀悕
//my off
define('SEND_CLOCK','1');//1 寮�0 鍏�

//鏄惁鎵撳紑绯荤粺鏃ュ織鏂囦欢
 ini_set('error_log',REAL_ROOT_PATH.'/log/phperror.txt');
/*ini_set('display_errors',1);*/
ini_set('log_errors',4); 
?>
