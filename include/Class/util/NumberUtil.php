<?php

     $digits = array(
	      '0', '1', '2', '3', '4', '5', '6', '7',
	      '8','9', 'a', 'b', 'c', 'd', 'e', 'f', 
	      'g', 'h','j', 'k', 'l','m', 'n',  'p',
	      'r', 's', 't', 'u', 'w', 'x', 'y','z' );
		$num = 0;
/**
	  * 将十进制的数字转换为指定进制的字符串。
	  * 
	  * @param i
	  *            十进制的数字。
	  * @param system
	  *            指定的进制，常见的2/8/16。
	  * @return 转换后的字符串。生成六位字符
	  */
	function  numericToString($i, $system) {
		
		$digits = array(
	      '0', '1', '2', '3', '4', '5', '6', '7',
	      '8','9', 'a', 'b', 'c', 'd', 'e', 'f', 
	      'g', 'h','j', 'k', 'l','m', 'n',  'p',
	      'r', 's', 't', 'u', 'w', 'x', 'y','z' );
		$num = 0;
		
		if ($i < 0) {
			$num = (2 * 0x7fffffff) + $i + 2;
		} else {
			$num = $i;
		}
		
		//char[] buf = new char[32];
		$buf = array();
		$charPos = 32;
		
		while (($num / $system) > 0) {
			$buf[--$charPos] = $digits[ floor($num % $system)];
			$num /= $system;
		}
		
		$buf[--$charPos] = $digits[floor($num % $system)];
		
		
		$output =  array_slice($buf, 0, 6);
		$out = "";
		for($i=5;$i>=0;$i--)
		{
			$out = $out.$output[$i];
		}
		
		return  $out;
	}
	
	/**
	 * 将其它进制的数字（字符串形式）转换为十进制的数字。
	 * 
	 * @param s
	 *            其它进制的数字（字符串形式）
	 * @param system
	 *            指定的进制，常见的2/8/16。
	 * @return 转换后的数字。
	 */
	function  stringToNumeric($s, $system) {
			$digits = array(
	      '0', '1', '2', '3', '4', '5', '6', '7',
	      '8','9', 'a', 'b', 'c', 'd', 'e', 'f', 
	      'g', 'h','j', 'k', 'l','m', 'n',  'p',
	      'r', 's', 't', 'u', 'w', 'x', 'y','z' );
		
		$buf = array();
		
		$buf =  str_split($s);
		
		$num = 0;
		
		for ($i = 0; $i < count($buf); $i++) {
			for ($j = 0; $j < count($digits); $j++) {
				if ($digits[$j] == $buf[$i]) {
					$num += $j * pow($system,(count($buf)-$i-1));//Math.pow(system, buf.length - i - 1);
					break;
				}
			}
		}
		
		return floor($num);
	}
?>