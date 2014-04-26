<?php
require_once ('app/libraries/ZzgdController.php');
require_once (REALPATH . '/config/Init.inc.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH . '/include/Class/util/TaobaoUtil.php');
require_once (REALPATH . '/include/Class/util/DateUtil.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH.'/include/CommonService.php');
class Supplier extends ZzgdController {
	public function __construct() {
		parent::__construct ();
	}
	function registered() {
		$this->load->view ( 'pc/supplier/registered' );
	}
	function index(){

        $dao=new CommonDao();
        $sql="select * from taoke_data limit 0,10";
        $request=$dao->getRowsBySQl($sql,"");
        print_r($request);
       /* $userinfo = array(
            'item_title'=>'赵森上传',
        );
        $id=$dao->saveRow('taoke_data',$userinfo,'');*/
    }

}
?>