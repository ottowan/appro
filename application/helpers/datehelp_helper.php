<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_date_thai'))
{
	function set_date_thai($dat)  //แปลงจาก 2005-01-01 เป็น  1/1/2548
	{
			$array1 = explode("-",$dat);//$array1 = split("-",$dat);
			$array1[0] = (integer)$array1[0]+543;
			$dat =  (integer)$array1[2]."/".(integer)$array1[1]."/".(integer)$array1[0]; 
			 return $dat;
	}
}

if ( ! function_exists('set_date_thai2'))
{
	function set_date_thai2($dat)  //แปลงจาก 2005-01-01 เป็น  1/1/2548
	{
			$array1 = explode("-",$dat);//$array1 = split("-",$dat);
			$array1[0] = (integer)$array1[0]+543;
			$dat =  $array1[2]."/".$array1[1]."/".$array1[0]; 
			 return $dat;
	}
}
if ( ! function_exists('cal_year_president'))
{
	function cal_year_president($datestart,$dateend)  //คำนวนหาวาระเป็นปี
	{
			$array1 = explode("/",$datestart);//$array1 = split("/",$datestart);
			$array2 = explode("/",$dateend);//$array2 = split("/",$dateend);
			$startyear=$array1[2];
			$dat = $array2[2]-$array1[2]; 
			$arraydat= array();
			$arraydat[0]=$dat;
			$arraydat[1]=$array1[2];
			
			return $arraydat;
	}
}
if ( ! function_exists('set_date_string'))
{
	function  set_date_string($dat)//จาก 2005/01/01 เป็น 1 มกราคม 2548
	{
			$array1 = explode(" ",$dat);//$array1 = split(" ",$dat);
			$a = $array1[0];
			$array1 = explode("-",$a);//$array1 = split("-",$a);
			$array1[0] = (integer)$array1[0]+543;
			switch((integer)$array1[1]){
						case 1: $month = "มกราคม&nbsp; ";break;
						case 2: $month = "กุมภาพันธ์ &nbsp;";break;						
						case 3: $month = "มีนาคม&nbsp; ";break;
						case 4: $month = "เมษายน&nbsp; ";break;
						case 5: $month = "พฤษภาคม&nbsp; ";break;
						case 6: $month = "มิถุนายน&nbsp; ";break;
						case 7: $month = "กรกฏาคม&nbsp; ";break;
						case 8: $month = "สิงหาคม&nbsp; ";break;
						case 9: $month = "กันยายน&nbsp; ";break;
 						case 10: $month = "ตุลาคม&nbsp; ";break;
						case 11: $month = "พฤศจิกายน&nbsp; ";break;
						case 12: $month = "ธันวาคม&nbsp; ";break;
			}
			$dat =  $month."  ".$array1[0];
			return $dat;
	}
}
if ( ! function_exists('set_date_string_thai'))
{
	function  set_date_string_thai($dat)
	{
			$array1 = explode("-",$dat);//$array1 = split("-",$dat);
			$array1[0] = (integer)$array1[0]+543;
			switch((integer)$array1[1])
			{
						case 1: $month = "มกราคม";break;
						case 2: $month = "กุมภาพันธ์";break;						
						case 3: $month = "มีนาคม";break;
						case 4: $month = "เมษายน";break;
						case 5: $month = "พฤษภาคม";break;
						case 6: $month = "มิถุนายน";break;
						case 7: $month = "กรกฏาคม";break;
						case 8: $month = "สิงหาคม";break;
						case 9: $month = "กันยายน";break;
 						case 10: $month = "ตุลาคม";break;
						case 11: $month = "พฤศจิกายน";break;
						case 12: $month = "ธันวาคม";break;
			}
			$dat =  (integer)$array1[2]."&nbsp;&nbsp;".$month."&nbsp;&nbsp;พ.ศ.".$array1[0];
			return $dat;
	}
}
if ( ! function_exists('set_date_thai_format'))
{
	function set_date_thai_format($dat)
	{
			$array1 = explode("/",$dat);//$array1 = split("/",$dat);
			switch((integer)$array1[1])
			{
						case 1: $month = "มกราคม";break;
						case 2: $month = "กุมภาพันธ์";break;						
						case 3: $month = "มีนาคม";break;
						case 4: $month = "เมษายน";break;
						case 5: $month = "พฤษภาคม";break;
						case 6: $month = "มิถุนายน";break;
						case 7: $month = "กรกฏาคม";break;
						case 8: $month = "สิงหาคม";break;
						case 9: $month = "กันยายน";break;
 						case 10: $month = "ตุลาคม";break;
						case 11: $month = "พฤศจิกายน";break;
						case 12: $month = "ธันวาคม";break;
			}
			$dat =  (integer)$array1[0]."&nbsp;&nbsp;".$month."&nbsp;&nbsp;พ.ศ.".($array1[2]);
			return $dat;
	}
}
if ( ! function_exists('set_date_mmddyyyy'))
{
	function set_date_mmddyyyy($dat)
	{
			$array1 = explode("/",$dat);//$array1 = split("/",$dat);
			$array1[2] = $array1[2]-543;
			$dat = $array1[1]."/".$array1[0]."/".$array1[2]; 
			 return $dat;
	}
}
if ( ! function_exists('year_thai'))
{
	function year_thai($year)  //แปลงจาก 2005 เป็น 2548
	{
			$year_thai=$year;
			$year_thai = (integer)$year_thai+543;
			
			 return $year_thai;
	}
}
if ( ! function_exists('rearr_date'))
{
	function rearr_date($dat)  //แปลงจาก 20050101 เป็น  1/1/2548
	{
			$day = substr($dat,6,2);
			$month = substr($dat,4,2);
			$year = substr($dat,0,4);
			$year = (integer)$year+543;
			$dat =  (integer)$day."/".(integer)$month."/".(integer)$year; 
			 return $dat;
	}
}
if ( ! function_exists('normal_date'))
{
	function normal_date($dat)  //แปลงจาก 01/01/2548 เป็น  1/1/2548
	{
			list($day,$month,$year) = explode("/",$dat);
			$year = (integer)$year;
			$dat =  (integer)$day."/".(integer)$month."/".(integer)$year; 
			 return $dat;
	}
}
if ( ! function_exists('inarr_date'))
{
	function inarr_date($dat)//แปลงจาก 1/1/2548  เป็น 20050101
	{
			 try {
				$array1 = explode("/",$dat);//$array1 = split("/",$dat);
				$array1[2] = $array1[2]-543;
				if(strlen ($array1[0])==1)$array1[0]='0'.$array1[0];
				if(strlen ($array1[0])<1)$array1[0]='00';
				if( (integer)$array1[0]>31)$array1[0]='31';
				if(strlen ($array1[1])==1)$array1[1]='0'.$array1[1];
				if(strlen ($array1[1])<1)$array1[1]='00';
				if( (integer)$array1[1]>12)$array1[1]='12';
				$dat = $array1[2].$array1[1].$array1[0]; 
				 return $dat;
			} catch (Exception $e) {
				return '';
			}
	}
}
?>