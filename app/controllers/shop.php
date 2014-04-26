<?php
require_once ('app/libraries/ZzgdController.php');
require_once (REALPATH . '/config/Init.inc.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH . '/include/Class/util/TaobaoUtil.php');
require_once (REALPATH . '/include/Class/util/DateUtil.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH.'/include/CommonService.php');
class Shop extends ZzgdController {
    public function __construct() {
        parent::__construct ();
    }
    function registered() {
        $this->load->view ( 'pc/shop/registered' );
    }
    function index(){
        $this->load->view ( 'pc/shop/index' );
    }
    function  wuyu(){
        $this->load->view('pc/shop/wuyu');
    }
    function registereds(){
        echo "dddd";
    }

}
?>