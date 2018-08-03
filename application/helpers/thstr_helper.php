<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getMBStrSplit'))
{
	// Convert a string to an array with multibyte string
	function getMBStrSplit($string, $split_length = 1){
		mb_internal_encoding('UTF-8');
		mb_regex_encoding('UTF-8'); 
		
		$split_length = ($split_length <= 0) ? 1 : $split_length;
		$mb_strlen = mb_strlen($string, 'utf-8');
		$array = array();
		$i = 0; 
		
		while($i < $mb_strlen)
		{
			$array[] = mb_substr($string, $i, $split_length);
			$i = $i+$split_length;
		}
		
		return $array;
	}

}
if ( ! function_exists('getStrLenTH'))
{
	// Get string length for Character Thai
	function getStrLenTH($string)
	{
		$array = getMBStrSplit($string);
		$count = 0;
		
		foreach($array as $value)
		{
			$ascii = ord(iconv("UTF-8", "TIS-620", $value ));
			
			if( !( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 )) )
			{
				$count += 1;
			}
		}
		return $count;
	}

}

if ( ! function_exists('getSubStrTH'))
{
	// Get part of string for Character Thai
	function getSubStrTH($string, $start, $length)
	{			
		$length = ($length+$start)-1;
		$array = getMBStrSplit($string);
		$count = 0;
		$return = "";
			
		for($i=$start; $i < count($array); $i++)
		{
			$ascii = ord(iconv("UTF-8", "TIS-620", $array[$i] ));
			
			if( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 ) )
			{
				//$start++;
				$length++;
			}
			
			if( $i >= $start )
			{
				$return .= $array[$i];
			}
			
			if( $i >= $length )
				break;
			}
		
		return $return;
	}

}

if ( ! function_exists('num2words'))
{
	function num2words($number)//convert number to string thai language
	{
		$position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
		$number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
		$number = $number + 0;
		$ret = "";
		if ($number == 0) return $ret;
		if ($number > 1000000)
		{
			$ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
			$number = intval(fmod($number, 1000000));
		}
	   
		$divider = 100000;
		$pos = 0;
		while($number > 0)
		{
			$d = intval($number / $divider);
			$ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
				((($divider == 10) && ($d == 1)) ? "" :
				((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
			$ret .= ($d ? $position_call[$pos] : "");
			$number = $number % $divider;
			$divider = $divider / 10;
			$pos++;
		}
		//echo $ret;
		return $ret;
	} 

}

if ( ! function_exists('ThaiBahtCon'))
{
	function ThaiBahtCon($amount_number)//convert number to string currency thai baht
	{
		$amount_number = number_format($amount_number, 2, ".","");
		//echo "<br/>amount = " . $amount_number . "<br/>";
		$pt = strpos($amount_number , ".");
		$number = $fraction = "";
		if ($pt === false)
			$number = $amount_number;
		else
		{
			$number = substr($amount_number, 0, $pt);
			$fraction = substr($amount_number, $pt + 1);
		}
	   
		//list($number, $fraction) = explode(".", $number);
		$ret = "";
		$baht = num2words($number);
		if ($baht != "")
			$ret .= $baht . "บาท";
	   
		$satang = num2words($fraction);
		if ($satang != "")
			$ret .=  $satang . "สตางค์";
		else
			$ret .= "ถ้วน";
		//return iconv("UTF-8", "TIS-620", $ret);
		return $ret;
	}
}

if ( ! function_exists('toMoney'))
{
	function toMoney($val,$symbol='$',$r=2)
	{

		$n = $val; 
		$c = is_float($n) ? 1 : number_format($n,$r);
		$d = '.';
		$t = ',';
		$sign = ($n < 0) ? '-' : '';
		$i =number_format(abs($n),$r); 
		$j = (($j = strlen($i)) > 3) ? $j % 3 : 0; 

	   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

	}
}

if ( ! function_exists('toMonth'))
{
	function toMonth($val=1)//input 1-12 to ชื่อเดือน
	{
		if($val<1||$val>12)return 'เลขเดือนผิดพลาด';
		$month = array(
		'1'=>'มกราคม',
		'2'=>'กุมภาพันธ์',
		'3'=>'มีนาคม',
		'4'=>'เมษายน',
		'5'=>'พฤษภาคม',
		'6'=>'มิถุนายน',
		'7'=>'กรกฎาคม',
		'8'=>'สิงหาคม',
		'9'=>'กันยายน',
		'10'=>'ตุลาคม',
		'11'=>'พฤศจิกายน',
		'12'=>'ธันวาคม',
		);
	   return  $month[intval($val)] ;

	}
}
?>