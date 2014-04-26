<?php
/**
 */

/* Report all errors except E_NOTICE. */
error_reporting(E_ALL ^ E_NOTICE);

/* 1. Define surported language list and default language. Note: you can use only one charset Chinese lanuage now. */
$_CFG['LangList']['EN_UTF-8']    = 'English UTF-8';
$_CFG['LangList']['ZH_CN_UTF-8'] = 'ZH_CN UTF-8';
$_CFG['DefaultLang']             = 'ZH_CN_UTF-8';

/* 2. Define admin user list. Like this: array('admin','yourloginname') */
$_CFG['AdminUser'] = array('admin');
$_CFG['AdminGroupName'] = 'admin';
/* Define report user list. Like this: array('admin', 'someone@example.com');*/
$_CFG['MailReportUser'] = array('');

/* 3. Define the username and password of the BugFree database. */
$_CFG['DB']['User']        = 'root';
$_CFG['DB']['Password']    = '123456';
//$_CFG['DB']['Host']        = 'nearmobile.org:6606'; //内网测试
$_CFG['DB']['Host']        = '162.243.147.227'; //外网
$_CFG['DB']['Database']    = 'taoth';
$_CFG['DB']['TablePrefix'] = 'nb_';
$_CFG['DBCharset']         = 'UTF8';

$_CFG['TOP']['Remote']= array(
	array('ip'=>'192.168.10.224','port'=>'9902'),
	array('ip'=>'192.168.10.225','port'=>'9902')//jz.fm1.me 192.168.10.194
);
//增值
$_CFG['TOP']['SRemote']= array('ip'=>'10.128.4.116','port'=>'9902');
//赠送时间
$_CFG['freeday'] = 14;

$_CFG['seckey']  = 'b7cc0435';
$_CFG['timeout']= 60*60*24 ;

$_CFG['redis']['ip']='127.0.0.1'; //外网
//$_CFG['redis']['ip']='192.168.9.62'; //内网测试
$_CFG['redis']['app_port']= 22162 ;
//$_CFG['redis']['app_port']=22142; //内网测试

$_CFG['httpsqs']['guleip']= '192.168.10.239';
$_CFG['httpsqs']['guleport']= '22810'; 
//$_CFG['httpsqs']['ip']= '192.168.10.40' ;//内网测试
//$_CFG['httpsqs']['port']= '22140';//内网测试
$_CFG['httpsqs']['queue']= 'pcgdzzccansyopt';

/* 4. Query Setting. */
$_CFG['QueryFieldNumber'] = 6;      // The fields number to query in QueryBugForm.php
$_CFG['ShowQuery']        = false;  // Showing query condition or not(QueryBug.php).
$_CFG['RecordPerPage']    = 20;     // Record count per page(QueryBug.php).

/* 5. File Setting. */
$_CFG['File']['BugFileName']       = 'BugFileName'; // Bug file name needed in AddBugForm.tpl and function bugAddFile() in FunctionsMain.inc.php.
$_CFG['File']['UploadDirectory']   = $_CFG['RealRootPath'] . '/BugFile';     // The directory to store uploaded files which must be under the BugFree directory and can be written by others. */
$_CFG['File']['MaxFileSize']       = 1024 * 1000;    // The max file size(Byte).
$_CFG['File']['DangerousTypeList'] = array('php','php3','php4','cgi','pl','py','asp','jsp');  // Dangerous file types list, will changed to .txt

/* 6. Mail setting. */
$_CFG['Mail']['On']          = true;
$_CFG['Mail']['FromAddress'] = "pm@linghui.com";
$_CFG['Mail']['FromName']    = 'linkwisePM';
$_CFG['Mail']['ReportTo']    = array();  // Where bug statistics message sened to. If empty, to all users.
$_CFG['Mail']['SendMethod']  = 'SMTP';   // MAIL|SENDMAIL|SMTP|QMAIL

/* 7. SMTP param setting. */
$_CFG['Mail']['SendParam']['Host']     = 'mail.linghui.com';       // The server to connect. Default is localhost
$_CFG['Mail']['SendParam']['SMTPAuth'] = true;    // Whether or not to use SMTP authentication. Default is FALSE
$_CFG['Mail']['SendParam']['Username'] = 'pm@linghui.com';       // The username to use for SMTP authentication.
$_CFG['Mail']['SendParam']['Password'] = '111111';       // The password to use for SMTP authentication.

/* 8. Auto update. We recommend you to set this to true, thus you can keep update with the latest version. */
$_CFG['Version']    = '1.0';    // Don't change.
$_CFG['AutoUpdate'] = true;     // true|false.

/* 9. Define the template dir. */
$_CFG['TemplateDir']    = $_CFG['RealRootPath'] . '/Template';
$_CFG['TPLCompileDir']  = $_CFG['RealRootPath'] . '/Data/TplCompile';

/* 10. Define debug mode. */
$_CFG['DebugMode'] = false;

?>
