<?php
class DateUtil{
	
/**
 * 计算时间
 *
 * @param unknown_type $date
 * @return unknown
 */
 public static function   xdate($date)
{
                date_default_timezone_set ('Etc/GMT-8');
		        $now_time = time();
				$check_time = strtotime($date);
				$difference = ($now_time+10) - $check_time;
				//log_message('info','now:'.now()."    time:".$comments[$i]['cdate'].'   diff:'.$difference);
				//秒
				$miao = round($difference);
				//分钟的时间差
				$mim = round($difference/60);
				//小时
				$all_hours = round($difference/3600);
				//天
				$all_date = round($difference/3600/24);
				//半个月
				$haf_mon = round($difference/3600/24/15);
				//一个月
				$month = round($difference/3600/24/30);
				
				//log_message('info','now:'.$now_time."    time:".$check_time.'   diff:'.$difference);
				
				
				$cdate = "";
		      if($miao <=60)
		        {
		        	if($miao <=0)
		        	{
		            	$cdate = "0 秒钟前";	
		        	}else{
					   $cdate = $miao."秒钟前";
		        	}
					
		        }else if($mim <=60)
		        {
				 	$cdate = $mim."分钟前";
				}else if($all_hours<=24)
				{ 
				 	$cdate = $all_hours."小时前";
				}else if($all_date<=15)
				{
					$cdate = $all_date."天前";
				}else if($haf_mon <=1)
				{
					$cdate = "半个月前";
				}else if($month >=1)
				{
					$cdate = "一个月前";
				}
		return $cdate;
}
/**
 * 计算今天到今后某天的时间差
 * return  几天几小时几分
 */
public static function calcTime($lasttime){
	
	$now_time = strtotime(date("Y-m-d H:i:s")); 
	
	$last_time = strtotime($lasttime);
	if(!empty($last_time) && $last_time>$now_time){	
		$time = $last_time-$now_time;
		$days = intval(($time / 3600) / 24);
		
		//86400 是一天
		$hours = intval(($time - $days*86400)/3600);
		
		$minute = intval(($time - $days*86400-$hours*3600)/60);
		if ($days == 0 && $hours == 0){
			return $minute.'分';
		}else if ($days == 0 && $minute == 0){
			return $hours.'小时';
		}else if ($minute == 0 && $hours == 0){
			return $days.'天';
		}else if($days == 0){
			return $hours.'小时'.$minute.'分';
		}else if ($hours == 0){
			return $days.'天'.$minute.'分';
		}else if ($minute == 0){
			return $days.'天'.$hours.'小时';
		}else {
			return $days.'天'.$hours.'小时'.$minute.'分';
		}
	}else{
		return 0;
	}
}
 /**
	 * 生成毫秒级的时间戳
	 * @return multitype:
	 */
public static	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		$rand = ((float)$usec + (float)$sec);
		$rand = str_replace(".", '', $rand);
		return $rand;
	}

    /**
     * @param $date  开始时间
     * @param $sec  增加时间(秒)
     */
    public static function dateadd($date,$sec)
    {
      $now = strtotime($date);
      $now  =  $now+$sec;
      return date('Y-m-d H:i:s', $now);
    }
}


?>