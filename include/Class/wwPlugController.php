<?php
require_once ('system/commonself/BaseController4CI.php');
/**
 * 旺旺插件控制器类
 *
 */
class wwPlugController extends BaseController4CI {
	
/**
 * 页面合成
 *
 */	
function  regView($view , $data)
	{
		$this->load->view($view,$data);
	}
}
?>