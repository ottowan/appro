<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('date2base'))
{
  	function date2base($date){
		if($date=='00000000'||$date=='')return '';
		$date=explode('/', $date);
		$date[2]=$date[2]-543;
		$result = $date[2].'-'.$date[1].'-'.$date[0];
		return $result;
	}
}
if ( ! function_exists('base2date'))
{
  	function base2date($date){
		if($date=='00000000'||$date=='00-00-0000'||$date=='0000-00-00'||$date=='')return "";
		$date=explode('-', $date);
		$day = $date[2];
		$month = $date[1];
		$year=$date[0]+543;
		//echo ' '.$date[1];
		$result = $date[2].'/'.$date[1].'/'.$year;
		return $result;
	}
}

if ( ! function_exists('date2text'))
{
  	function date2text($date,$th = false){
		if($date=='00000000'||$date=='')return '';
		$date=explode('/', $date);
		$day = "";
		$month = "";
		$year = "";
		switch ($date[1]) {
			case '01':
				$month = " มกราคม";
				break;
			case '02':
				$month = " กุมภาพันธ์";
				break;
			case '03':
				$month = " มีนาคม";
				break;
			case '04':
				$month = " เมษายน";
				break;
			case '05':
				$month = " พฤษภาคม";
				break;
			case '06':
				$month = " มิถุนายน";
				break;
			case '07':
				$month = " กรกฎาคม";
				break;
			case '08':
				$month = " สิงหาคม";
				break;
			case '09':
				$month = " กันยายน";
				break;
			case '10':
				$month = " ตุลาคม";
				break;
			case '11':
				$month = " พฤศจิกายน";
				break;
			case '12':
				$month = " ธันวาคม";
				break;
			default:
			   $month = " มกราคม";
		}
		$year = " พ.ศ.".$date[2];
		$day = (int)$date[0];
		$result = $day.$month.$year;
		if($th)$result=thainumDigit($result);  
		return $result;
	}
}

if ( ! function_exists('thainumDigit'))
{
  	function thainumDigit($num){  
    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),  
    array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),  
    $num);  
};  
}
?>