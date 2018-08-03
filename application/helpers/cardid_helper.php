<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('card2num'))
{
	// Convert a string to an array with multibyte string
	function card2num($card_id){
			$card_array = explode("-", $card_id);
			$num_text =  implode("",$card_array);
			return $num_text;
	}

}

if ( ! function_exists('text2card'))
{
	// Convert a string to an array with multibyte string
	function text2caed($num_text){
			$card_array = explode("-", $card_id);
			$num_text =  implode("",$card_array);
			return $num_text;
	}

}
?>