//如果需要使用TOP的 thritf接口，那么需要在congfie.php 文件中声明

在index.php 文件中加入 

$GLOBALS['THRIFT_ROOT'] = REALPATH . '/include/Class/thrift';


1、$GLOBALS['THRIFT_ROOT'] = REAL_ROOT_PATH . '/include/Class/thrift' ;
define('REALPATH_THRIFT_ROOT',REAL_ROOT_PATH . '/include/Class/thrift');
2、在config 配置文件中配置Thritf远程服务器地址

$_CFG['TOP']['Remote']= array(
	array('ip'=>'','port'=>'5523')
);


3、需要配置一个拦截器，并引入 

当前目录下的文件  TopAipTransportHooks.php hooks目录下面


$hook['post_controller'] = array(
                                'class'    => 'TopAipTransportHooks',
                                'function' => 'closeTransport',
                                'filename' => 'TopAipTransportHooks.php',
                                'filepath' => 'hooks',
                                'params'   => array()
                                );
                                
                                
                                
调用示例 

require_once (REALPATH.'/include/openpf/top/TopApiThriftHelp.php');
require_once (REALPATH.'/include/openpf/top/TopApiThrift.php');

$pro = TopApiThriftHelp::getTopApiClientProtocol();
$topapi = new topapi_TopApiThriftClient($pro);     


$_CFG['appname']='';
$_CFG['slefip']='';

                           