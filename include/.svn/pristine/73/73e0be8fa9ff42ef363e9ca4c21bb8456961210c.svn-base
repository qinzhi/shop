<?php



function getZhCnFristb($name){
	
		global $_CFG;
	
 		$LastRealName = $name;
        $RealNamePrefix = sysSubStr($LastRealName, 1);
        $FirstLetter = $_CFG['PinYin'][$RealNamePrefix];
        if($FirstLetter == '')
        {
	        $FirstLetter = strtoupper(substr($LastRealName, 0, 1));
        }
        /*if(!ereg('[A-Z0-9]',$FirstLetter))
        {
            $FirstLetter = strtoupper(substr($name, 0, 1));
        }*/
    /*    if(!ereg('[A-Z0-9]',$FirstLetter))
        {
            $FirstLetter = '*';
        }*/
        
        return $FirstLetter ;
        
}



function sysSubStr($String,$Length,$Append = false)
{
    global $_CFG;

    $I = 0;
    $Count = 0;
    if($_CFG["DefaultLang"]  == "ZH_CN_UTF-8")
    {
        while ($Count < $Length)
        {
            $StringTMP = substr($String,$I,1);
            if ( ord($StringTMP) >=224 )
            {
                $StringTMP = substr($String,$I,3);
                $I = $I + 3;
                $Count += 2;
            }
            elseif( ord($StringTMP) >=192 )
            {
                $StringTMP = substr($String,$I,2);
                $I = $I + 2;
                $Count ++;
            }
            else
            {
                $I = $I + 1;
                $Count ++;
            }
            $StringLast[] = $StringTMP;
        }
        if($Count == $Length)
        {
            array_pop($StringLast);
        }
        $StringLast = implode("",$StringLast);
        if($Append && $String != $StringLast)
        {
            $StringLast .= "...";
        }
        return $StringLast;
    }
    else
    {
        while ($Count < $Length)
        {
            $StringTMP = substr($String,$I,1);
            if( ord($StringTMP) >=128 )
            {
                $StringTMP = substr($String,$I,2);
                $I = $I + 2;
                $Count += 2;
            }
            else
            {
                $I = $I + 1;
                $Count ++;
            }
            $StringLast[] = $StringTMP;
        }
        if($Count == $Length)
        {
            array_pop($StringLast);
        }
        $StringLast = implode("",$StringLast);
        if($Append && $String != $StringLast)
        {
            $StringLast .= "...";
        }
        return $StringLast;
    }
}

/**
 * 
 * 获取业务相关的时间
 *
 */
function getbDataString($aimdate){
	
	
	if( empty($aimdate))
		return ''; 
	
	
		
	$curr_date = time();
	
	$diff =round(($curr_date-strtotime($aimdate))/3600/24) ; 
	
	$datesss = date('H:i',strtotime($aimdate));
	
	//echo  date("Y-m-d H:i:s",strtotime($aimdate)).$datesss;

	$datestr = '';
	
	if( $diff == 0  ){

		$datestr = $datesss;
	
	}elseif( $diff == 1 ){
		
		$datestr = "昨天 ". $datesss;
	
	}else{

		$datestr = date("Y-m-d H:i:s",strtotime($aimdate));
		
	}
	
	return $datestr;
	
	
	
	//昨天显示 昨天+小时分钟
	
	
	//以前的显示具体时间
	
		
	
}



/**
 * 获取会话编号
 *
 * @return unknown
 */
function getuuid($perflag) {
	
	$rand =  rand ( 1, 10000 ) . uniqid ( '', true );
	$rand = str_replace(".", "", $rand);
	$rand = $perflag.$rand;
	return $perflag.md5($rand);
	
}


function getMutilFileName($filename){
	
	
	if( (bool)strpos($filename,',,') ){
		$picgrouparray = explode(',,',$filename);
		return $picgrouparray[0];
	}else{
		return $filename;
	}
	
	
}


/**
 * 判断字符是否为纯汉字
 *
 * @param unknown_type $str   0 '纯英文'  1 '纯汉字' 2 '中英文混排序'
 * @return unknown
 */
function utf8_str($str){
    $mb = mb_strlen($str,'utf-8');
    $st = strlen($str);
    if($st==$mb)
        //return '纯英文';
        return 0;
    if($st%$mb==0 && $st%3==0) //return '纯汉字';
        return 1;
    return 2;
}


/**
 * $date 需要操作的日期
 * $day  相加的天数
 * 
 * @return 返回的日期
 */
function addday($date, $day) {
	//return date('Y-m-d',strtotime($date ." +".$day." day"));
	$t1 = strtotime ( $date );
	$t2 = $t1 + $day * 3600 * 24;
	return date ( "Y-m-d", $t2 );

}

/**
 * $date 需要操作的日期
 * $day  相加的天数
 * 
 * @return 返回的日期
 */
function adddayformat($date, $day, $format) {
	//return date('Y-m-d',strtotime($date ." +".$day." day"));
	

	$t1 = strtotime ( $date );
	$t2 = $t1 + $day * 3600 * 24;
	return date ( $format, $t2 );

}

/**
 * Enhance the function addslashes())
 *
 * @author                  Chunsheng Wang <wwccss@263.net>
 * @param  mix     $Data    the variable to addslashes.
 * @return mix              formated variable.
 */
function sysAddSlash($Data) {
	if (is_array ( $Data )) {
		foreach ( $Data as $Key => $Value ) {
			if (is_array ( $Value )) {
				$Data [$Key] = sysAddSlash ( $Value );
			} else {
				$Data [$Key] = addslashes ( $Value );
			}
		}
	} else {
		$Data = addslashes ( $Data );
	}
	return $Data;
}

/**
 *
 * Get table names with prefix
 *
 * @author                      Yupeng Lee<leeyupeng@gmail.com>
 * @param   string  $TableNames TableNames split by ,
 * @return  string              TableNames whith prefix split by ,
 */
function dbGetPrefixTableNames($TableNames) {
	/* global $_CFG;

    if($_CFG['UserDB']['User'] != '' && $TableNames == $_CFG['UserTable']['TableName'])
    {
        return $TableNames;
    }
    $TableList = explode(',', $TableNames);
    $PrefixTableNameList = array();
    foreach($TableList as $TableName)
    {
        $TableName = trim($TableName);
        $PrefixTableNameList[] = $_CFG['DB']['TablePrefix'] . $TableName;
    }
    $PrefixTableNames = join(',', $PrefixTableNameList);*/
	
	return $TableNames;
}

/**
 * create tags like "<select><option></option></select>"
 *
 * @author                     wwccss<wwccss@263.net>
 * @param array  $ArrayData    the array to create select tag from.
 * @param string $SelectName   the name of the select tag.
 * @param string $Mode         Normal|Reverse,if normal, show the key of the array in the select box, else show the value of the array in the select box.
 * @param string $SelectItem   the item(s) to be selected, can like item1,item2.
 * @param string $Attrib       other params such as multiple, size and style.
 * @param booble $Echo         show directly or false. 
 */
function htmlSelect($ArrayData, $SelectName, $Mode = "Reverse", $SelectItem = "", $Attrib = "", $PairIndex = "", $Echo = false, $default = false) {
	if (! is_array ( $ArrayData )) {
		$ArrayData = array ();
	}
	
	$Mode = $Mode != 'Normal' ? 'Reverse' : 'Normal';
	
	/* The begin. */
	if( (bool)strpos('dd'.$Attrib,'multiple')  ){ //阿里巴巴专用
		$SelectString = "\n  <select name='$SelectName' ";
	}else
		$SelectString = "\n  <select name='$SelectName' ";
	
	/* Set the id. */
	if (preg_match ( "/\[/", $SelectName )) {
		$SelectName = explode ( "[", $SelectName );
		$SelectString .= "id='$SelectName[0]' ";
	} else {
		$SelectString .= "id='$SelectName'";
	}
	
	/* The param. */
	$SelectString .= " $Attrib >\n";
	
	/* Explode the SelectItems. */
	$SelectItem = explode ( ",", $SelectItem );
	
	/* The option. */
	if ($PairIndex != "") {
		$PairIndex = explode ( ',', $PairIndex );
		$KeyIndex = trim ( $PairIndex [0] );
		$ValueIndex = trim ( $PairIndex [1] );
	}
	
	if (count ( $ArrayData ) == 0 && ! ereg ( 'multiple', strtolower ( $Attrib ) )) {
		$SelectString .= '<option selected label="null" value="" style="color:#AAAAAA;">--------</option>';
	} else {
		foreach ( $ArrayData as $Key => $Value ) {
			if (is_array ( $Value )) {
				$Key = $Value [$KeyIndex];
				$Value = $Value [$ValueIndex];
			}
			if ($Mode == "Normal") {
				if (in_array ( $Value, $SelectItem ) && $SelectItem != '') {
					if ($default)
						$SelectString .= "<option value='$Value'>$Key</option>";
					else
						$SelectString .= "<option value='$Value' selected='selected'>$Key</option>";
				} else {
					$SelectString .= "<option value='$Value'>$Key</option>";
				}
			} elseif ($Mode == "Reverse") {
				if (in_array ( $Key, $SelectItem ) && $SelectItem != '') {
					$SelectString .= "<option value='$Key' selected='selected'>$Value</option>";
				} else {
					$SelectString .= "<option value='$Key'>$Value</option>";
				}
			}
			$SelectString .= "\n";
		}
	}
	if ($default)
		$SelectString .= "<option value='' selected='selected'>===请选择===</option>";
		/* The end. */
	$SelectString .= "</select>\n";
	
	if ($Echo) {
		echo $SelectString;
	}
	return $SelectString;
}

function htmlSelectm($ArrayData, $SelectName, $Mode = "Reverse", $SelectItem = "", $Attrib = "", $PairIndex = "", $Echo = false, $default = false) {
	if (! is_array ( $ArrayData )) {
		$ArrayData = array ();
	}
	
	$Mode = $Mode != 'Normal' ? 'Reverse' : 'Normal';
	
	/* The begin. */
	if( (bool)strpos('dd'.$Attrib,'multiple')  ){ //阿里巴巴专用
		$SelectString = "\n  <select name='$SelectName"."[]' ";
	}else
		$SelectString = "\n  <select name='$SelectName' ";
	
	/* Set the id. */
	if (preg_match ( "/\[/", $SelectName )) {
		$SelectName = explode ( "[", $SelectName );
		$SelectString .= "id='$SelectName[0]' ";
	} else {
		$SelectString .= "id='$SelectName'";
	}
	
	/* The param. */
	$SelectString .= " $Attrib >\n";
	
	/* Explode the SelectItems. */
	$SelectItem = explode ( ",", $SelectItem );
	
	/* The option. */
	if ($PairIndex != "") {
		$PairIndex = explode ( ',', $PairIndex );
		$KeyIndex = trim ( $PairIndex [0] );
		$ValueIndex = trim ( $PairIndex [1] );
	}
	
	if (count ( $ArrayData ) == 0 && ! ereg ( 'multiple', strtolower ( $Attrib ) )) {
		$SelectString .= '<option selected label="null" value="" style="color:#AAAAAA;">--------</option>';
	} else {
		foreach ( $ArrayData as $Key => $Value ) {
			if (is_array ( $Value )) {
				$Key = $Value [$KeyIndex];
				$Value = $Value [$ValueIndex];
			}
			if ($Mode == "Normal") {
				if (in_array ( $Value, $SelectItem ) && $SelectItem != '') {
					if ($default)
						$SelectString .= "<option value='$Value'>$Key</option>";
					else
						$SelectString .= "<option value='$Value' selected='selected'>$Key</option>";
				} else {
					$SelectString .= "<option value='$Value'>$Key</option>";
				}
			} elseif ($Mode == "Reverse") {
				if (in_array ( $Key, $SelectItem ) && $SelectItem != '') {
					$SelectString .= "<option value='$Key' selected='selected'>$Value</option>";
				} else {
					$SelectString .= "<option value='$Key'>$Value</option>";
				}
			}
			$SelectString .= "\n";
		}
	}
	if ($default)
		$SelectString .= "<option value='' selected='selected'>===请选择===</option>";
		/* The end. */
	$SelectString .= "</select>\n";
	
	if ($Echo) {
		echo $SelectString;
	}
	return $SelectString;
}



/**
 * 截取中英文混合的字符串，字符串采用UTF-8编码
 *
 * @param unknown_type $string
 * @param unknown_type $start
 * @param unknown_type $length
 * @return unknown
 */
function substr_utf8($string, $start, $length) { //by aiou   
	$chars = $string;
	//echo $string[0].$string[1].$string[2];   
	$i = 0;
	do {
		if (preg_match ( "/[0-9a-zA-Z]/", $chars [$i] )) { //纯英文   
			$m ++;
		} else {
			$n ++;
		} //非英文字节,   
		$k = $n / 3 + $m / 2;
		$l = $n / 3 + $m; //最终截取长度；$l = $n/3+$m*2？   
		$i ++;
	} while ( $k < $length );
	$str1 = mb_substr ( $string, $start, $l, 'utf-8' ); //保证不会出现乱码   
	return $str1;
}

/**
 * 上传图片
 *
 */
function uploadFiles($filefiled, $uploadfilepath, $filenameprfix) {
	
	//print_r($_FILES);
	//global $_CFG;
	if (! empty ( $_FILES )) {
		//print_r($_FILES);
		$tempFile = $_FILES [$filefiled] ['tmp_name'];
		//$targetPath = $_CFG['RealRootPath'] . '/'.$_REQUEST['folder'] . '/';
		//$targetFile =  str_replace('//','/',$targetPath) . $_FILES['upfile']['name'];
		if ($_FILES [$filefiled] ['name'] != '') {
			$file_perfix = rand ( 1000, 10000 ) . date ( 'YmjGis' ) . floor ( microtime () * 1000 );
			$filename = $_FILES [$filefiled] ['name'];
			$filenametype = substr ( $filename, strrpos ( $filename, '.' ), strlen ( $filename ) );
			$upload_file_name = $filenameprfix . $file_perfix . $filenametype;
			move_uploaded_file ( $tempFile, $uploadfilepath . $upload_file_name );
		}
	
	}
	
	$result = array ();
	$result ['filepath'] = $uploadfilepath . $upload_file_name;
	$result ['filename'] = $upload_file_name;
	$result ['type'] = $_FILES [$filefiled] ['type'];
	return $result;

}

/**
 * 上传图片
 *
 */
function uploadFiles4Fullname($filefiled, $uploadfilepath) {
	
	//print_r($_FILES);
	//global $_CFG;
	if (! empty ( $_FILES )) {
		//print_r($_FILES);
		$tempFile = $_FILES [$filefiled] ['tmp_name'];
		move_uploaded_file ( $tempFile, $uploadfilepath );
	}
	
	$result = array ();
	$result ['filepath'] = $uploadfilepath;
	$result ['filename'] = $uploadfilepath;
	$result ['type'] = $_FILES [$filefiled] ['type'];
	return $result;

}

/**
 * Enter description here...
 *
 * @param unknown_type $im
 * @param unknown_type $maxwidth
 * @param unknown_type $maxheight
 * @param unknown_type $name
 */
function ResizeImage($im, $maxwidth, $maxheight, $name) {
	
	$width = imagesx ( $im );
	$height = imagesy ( $im );
	
	if (($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)) {
		
		if ($maxwidth && $width > $maxwidth) {
			$widthratio = $maxwidth / $width;
			$RESIZEWIDTH = true;
		}
		if ($maxheight && $height > $maxheight) {
			$heightratio = $maxheight / $height;
			$RESIZEHEIGHT = true;
		}
		if ($RESIZEWIDTH && $RESIZEHEIGHT) {
			if ($widthratio < $heightratio) {
				$ratio = $widthratio;
			} else {
				$ratio = $heightratio;
			}
		} elseif ($RESIZEWIDTH) {
			$ratio = $widthratio;
		} elseif ($RESIZEHEIGHT) {
			$ratio = $heightratio;
		}
		$newwidth = $width * $ratio;
		$newheight = $height * $ratio;
		if (function_exists ( "imagecopyresampled" )) {
			$newim = imagecreatetruecolor ( $newwidth, $newheight );
			imagecopyresampled ( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height );
		} else {
			$newim = imagecreate ( $newwidth, $newheight );
			imagecopyresized ( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height );
		}
		ImageJpeg ( $newim, $name, 100 );
		ImageDestroy ( $newim );
	} else {
		ImageJpeg ( $im, $name );
		if( !empty($newim) )
			ImageDestroy ( $newim );
	}
}

function changeimagesize($imagetype, $tempfile, $filename, $resizewidth, $resizeheight) {
	
	// 生成图片的宽度  $_FILES ['image'] ['type']  $_FILES ['image'] ['tmp_name']
	//$resizewidth = 40;
	// 生成图片的高度 
	//$resizeheight = 80;
	if ($imagetype == "image/pjpeg") {
		//echo $imagetype;
		$im = imagecreatefromjpeg ( $tempfile );
	} elseif ($imagetype == "image/x-png") {
		$im = imagecreatefrompng ( $tempfile );
	} elseif ($imagetype == "image/gif") {
		$im = imagecreatefromgif ( $tempfile );
	}
	
	if ($im) {
		if (file_exists ( $filename )) {
			unlink ( $filename );
		}
		ResizeImage ( $im, $resizewidth, $resizeheight, $filename );
		ImageDestroy ( $im );
	}
	
//echo $im;


}

//加密
/*function encrypt($encrypt, $key = "") {
	$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND );
	$passcrypt = mcrypt_encrypt ( MCRYPT_RIJNDAEL_256, $key, $encrypt, MCRYPT_MODE_ECB, $iv );
	$encode = base64_encode ( $passcrypt );
	return $encode;
}*/

//解密函数
/*function decrypt($decrypt, $key = "") {
	$decoded = base64_decode ( $decrypt );
	$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND );
	$decrypted = mcrypt_decrypt ( MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_ECB, $iv );
	return $decrypted;
}
*/


////////////  http://www.nonb.cn/blog/php-des-jia-mi-suan-fa.html


/**
 * 加密
 *
 * @param unknown_type $input
 * @param unknown_type $key
 * @return unknown
 */
function encrypt($input, $key) {
	$size = mcrypt_get_block_size ( 'des', 'ecb' );
	$input = mb_convert_encoding($input, 'GBK', 'UTF-8');
	$input = pkcs5_pad ( $input, $size );
	//$key = $this->key;    	
	$td = mcrypt_module_open ( 'des', '', 'ecb', '' );
	$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
	@mcrypt_generic_init ( $td, $key, $iv );
	$data = mcrypt_generic ( $td, $input );
	mcrypt_generic_deinit ( $td );
	mcrypt_module_close ( $td );
	$data = base64_encode ( $data );
	return $data;
}

/**
 * 解密
 *
 * @param unknown_type $encrypted
 * @param unknown_type $key
 * @return unknown
 */
function decrypt($encrypted, $key) {
	$encrypted = base64_decode ( $encrypted );
	//$key =$this->key;    	
	$td = mcrypt_module_open ( 'des', '', 'ecb', '' );
	//$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'ecb', '');
	//$td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '', MCRYPT_MODE_CBC, '');
	//使用MCRYPT_DES算法,cbc模式          	
	$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
	//$ks = mcrypt_enc_get_key_size ( $td );
	@mcrypt_generic_init ( $td, $key, $iv );
	//初始处理           	
	$decrypted = mdecrypt_generic ( $td, $encrypted );
	//解密           	
	mcrypt_generic_deinit ( $td );
	//结束          
	mcrypt_module_close ( $td );
	$y = pkcs5_unpad ( $decrypted );
	$y = mb_convert_encoding($y, 'UTF-8', 'GBK');
	return $y;
}

function pkcs5_pad($text, $blocksize) {
	$pad = $blocksize - (strlen ( $text ) % $blocksize);
	return $text . str_repeat ( chr ( $pad ), $pad );
}


function pkcs5_unpad($text) {
	$pad = ord ( $text {strlen ( $text ) - 1} );
	if ($pad > strlen ( $text ))
		return false;
	if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)
		return false;
	return substr ( $text, 0, - 1 * $pad );
}



function encrypt1($encrypt,$key="") { 
$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND ); 
$passcrypt = mcrypt_encrypt ( MCRYPT_RIJNDAEL_256, $key, $encrypt, MCRYPT_MODE_ECB, $iv ); 
$encode = base64_encode ( $passcrypt ); 
return $encode; 
} 

function decrypt1($decrypt,$key="") { 
$decoded = base64_decode ( $decrypt ); 
$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND ); 
$decrypted = mcrypt_decrypt ( MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_ECB, $iv );
return $decrypted; 
} 


function den(  $plain_text , $key  ){
	
	 /* Open module, and create IV */
    $td = mcrypt_module_open('des', '', 'ecb', '');
    $key = substr($key, 0, mcrypt_enc_get_key_size($td));
    $iv_size = mcrypt_enc_get_iv_size($td);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    /* Initialize encryption handle */
    if (mcrypt_generic_init($td, $key, $iv) != -1) {

        /* Encrypt data */
        $c_t = mcrypt_generic($td, $plain_text);
        mcrypt_generic_deinit($td);

        /* Reinitialize buffers for decryption */
        mcrypt_generic_init($td, $key, $iv);
        $p_t = mdecrypt_generic($td, $c_t);

        /* Clean up */
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        
        return $p_t;
    }else 
    	return '';
	
	
}

function genRandomString($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
 
    shuffle($chars);    // 将数组打乱 
     
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    } 
 
    return $output; 
 
} 


/**
 * 
 * 判断当前php运行环境的操作系统
 *
 * @return unknown
 * 
 */
function iswidnows(){
	
	//$os = $_ENV["OS"];
	if(strpos($_ENV["OS"],"Window")) {
	
		return 1;
	
	}else{
	    return 0;
	}
	
	
}




/**
 * 
 * 判断当前php运行环境的操作系统
 *
 * @return unknown
 * 
 */
function isFastCgi(){
	
	$runmodel = php_sapi_name();
	
	if( $runmodel ==  "fpm-fcgi") {
		return 1;
	}else{
	    return 0;
	}
	
	
}


/**
 * 
 * 是否允许fastcgi_finish_request() 函数以提高性能
 *
 */
function runfastcgifinishrequest(){
	
	if( isFastCgi() == 1  )
		fastcgi_finish_request(); /* 响应完成, 关闭连接 */
	
}


/**
 * 
 * 获取回话生命周期
 * 
 */
function getSessionTimeout(){
	
	
	global $_CFG;
	
	$now = time(NULL);
	$timeout = $now + $_CFG['timeout'];
	
	return $timeout;
}

/**
 * 
 * 本地应用程序信息
 * @return unknown
 * 
 */
function getClientinfo(){
	
	global $_CFG;
	
	$clientip = $_CFG['slefip'];
	$appname = $_CFG['appname'];
	$info_arr = array('appname'=>$appname , 'ip'=>$clientip);
	return json_encode($info_arr);
	
}
/**
 * 当前用户访问网站是否为手机登录
 * @return boolean
 */
 function isMobile() { 
 	$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''; 
 	$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:''; 	 
 	  $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ'); 
 	  $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod'); 
 	  $found_mobile= CheckSubstrs($mobile_os_list,$useragent_commentsblock) || CheckSubstrs($mobile_token_list,$useragent); 
 	  if ($found_mobile) 
 	       { 
 	       	return true; 
 	       } 
 	  else {
 	  	return false; 
 	    }
 	   
  }
  
 function CheckSubstrs($substrs,$text)
  {
  	foreach($substrs as $substr)
  	{
  		if(false!==strpos($text,$substr))
  		{
  			return true;
  		}
  	}
  	return false;
  	 
  }

function getPageSpeedbean($request){
	
	$op = $request['op']==''?"-1":$request['op'];
	$datestr = date('YmdHis');
	$opter = array(
						'appid'=>'1',
						'channelid'=>$request['channel'],
						'sessionid'=>$request['sessionid'],
						'optdt'=>$datestr,
						'openid'=>$request['openid']==''?"":$request['openid'],
						'platform'=>$request['platform'],
						'phonemodel'=>$request['phonemodel'],
						'mplatform'=>$request['mplatform'],
						'modulename'=>$request['modulename'],
						//'ipaddr'=>$this->getIP(),
						'usercode'=>$request['usercode'],
						'version'=>$request['version'],
						'operators'=>$request['operators']==''?"":$request['operators'],
						'nettype'=>$request['nettype']==''?"":$request['nettype'],
						'resolution'=>$request['resolution']==''?"":$request['resolution'],
						'area'=>$request['area']==''?"":$request['area'],
						'fristopen'=>$request['fristopen'],
						'openflag'=>$request['openflag'],
						'extd'=>$request['extd']==''?"":$request['extd'],
						'op'=>$op,
						'nt'=>$request['nt']==''?"":$request['nt'],
						'imi'=>$request['imi']==''?"":$request['imi'],
						'width'=>$request['width'],
						'height'=>$request['height'],
						'cra'=>$request['cra']==''?"-1":$request['cra'],
						'ad'=>$request['ad']==''?"":$request['ad'],
						'userid'=>$request['userid'],
						'us'=>$request['us']==''?"":$request['us'],
						'clientid'=>$request['clientid']
					   );
		 $opterlog = json_encode ( $opter );

		 return $opterlog;
}


?>