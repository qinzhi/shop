<?php

require_once ('system/commonself/BaseController4CI.php');

class FmController4CI extends BaseController4CI {
	
	public function __construct() {
		parent::__construct ();
	
	}
	
	
	public function getString4Tpl($currobj , $tplpath ){
		return $currobj->load->view($tplpath,$data,TRUE);	
	}
	
	function ad(){	

		$request = &$_GET['request'];
		$reponse = &$_GET['reponse'];
		
		$ad = $request['ad'];
		$array=explode('#',$ad);
		$adid = $array[0];
		$disflag = $array[1];
		$pramt = $array[2];
		
		//按照广告引擎编号来决定关闭某个广告
		if( $adid == '-1' ){
			$disflag = '1';
		}
		//关闭某个引擎的某个应用的广告
		if( $adid == '-1' && $pramt == 'a14ec329d38587a' ){
			$disflag = '1';
		}
		
		//关闭某个引擎的的某个应用编号
		if( $adid == '-1' ){
			
			if( $pramt == 'a14ec329f9d3cd5'  ) //替换appkey为11111的应用编号为222222
			    $pramt = 'a14edf1fec4337a';
			    
		}
		
		if( $adid == '' || $disflag == '' || $pramt == '' ){
			$ad = '';
		}else{
			$ad = "$adid#$disflag#$pramt";
		}
		   
		
		
		$reponse['ad'] = $ad;
		
	}
	
	/**
	 *
	 * 调用端提交给服务器端的统计信息
	 *
	 */
	function getClientinfo(){
	
		$clientinfo = array(
				'clientname'=>'alww',
				'ip'=>$this->getIP(),
				'speedflag'=>'0'
		);
	
		$clientinfo_str = json_encode($clientinfo);
	
		return $clientinfo_str;
			
	}
	
}

?>