<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('div_open'))
{
  	function div_open($class = NULL, $id = NULL)
	{
		$code   = '<div ';
		$code   .= ( $class != NULL )   ? 'class="'. $class .'" '   : '';
		$code   .= ( $id != NULL )      ? 'id="'. $id .'" '         : '';
		$code   .= '>';
		return $code;
	}  
}
if ( ! function_exists('div_close'))
{
  	function div_close()
	{
		return "</div>\n";
	}
}

if ( ! function_exists('header_open'))
{
  	function header_open($class = NULL, $id = NULL)
	{
		$code   = '<header ';
		$code   .= ( $class != NULL )   ? 'class="'. $class .'" '   : '';
		$code   .= ( $id != NULL )      ? 'id="'. $id .'" '         : '';
		$code   .= '>';
		return $code;
	}  
}
if ( ! function_exists('header_close'))
{
  	function header_close()
	{
		return "</header>\n";
	}
}

if ( ! function_exists('tag_open'))
{
  	function tag_open($tag = NULL,$class = NULL, $id = NULL,$js = NULL)
	{
		$code   = '<'.$tag.' ';
		$code   .= ( $class != NULL )   ? 'class="'. $class .'" '   : '';
		$code   .= ( $id != NULL )      ? 'id="'. $id .'" '         : '';
		$code   .= ( $js != NULL )      ?  $js .' '         : '';
		$code   .= '>';
		return $code;
	}  
}
if ( ! function_exists('tag_close'))
{
  	function tag_close($tag = NULL)
	{
		return "</".$tag.">\n";
	}
}
if ( ! function_exists('addscript'))
{
	function addscript($path=""){
		return "<script src=\"".base_url($path)."\"></script>\n";
	}
}
?>