<?php
require_once ('app/libraries/ZzgdController.php');
require_once (REALPATH . '/config/Init.inc.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH . '/include/Class/util/TaobaoUtil.php');
require_once (REALPATH . '/include/Class/util/DateUtil.php');
require_once ('include/Class/HttpClient.class.php');
require_once (REALPATH.'/include/CommonService.php');
class Courier extends ZzgdController {
    public function __construct() {
        parent::__construct ();
    }
    function index(){
        $this->load->view ( 'pc/courier/index' );
    }

    function about(){
        $this->load->view ( 'pc/courier/about' );
    }
    function programs(){
        $this->load->view ( 'pc/courier/programs' );
    }
    function contact(){
        $this->load->view ( 'pc/courier/contact' );
    }
    function query(){
        $this->load->view ( 'pc/courier/query' );
    }
    function donate(){
        $this->load->view ( 'pc/courier/donate' );
    }
}
?>