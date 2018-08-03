<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?PHP echo base_url("bower_components/w3css-v4/w3.css");?>"> 
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		/*background-color: #ffffcc;*/
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 0 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.container {
		max-width: 100%;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>

<div id="container">
	<h1 class="w3-blue-grey" style="margin-bottom: 0px;"><?=$title?></h1>
	
	<div class="w3-bar w3-border w3-grey">
  <a href="<?=base_url('ccase')?>" class="w3-bar-item w3-blue-grey "><div class="el el-home">หน้าแรก</div></a>
  <?PHP
  if(isset($menu)){
  foreach($menu as $bar){
	$text = '';
	if(!empty($bar['css']))$css=$bar['css'];
	else $css='';
	if(!empty($bar['link'])){
		$text='<a href="'.$bar['link'].'" class="w3-bar-item '.$css.'">';
		$text.=$bar['text'];
		$text.='</a>';
	}else	
		$text= '<div class="w3-bar-item '.$css.'">'.$bar['text'].'</div>';
    echo $text;
  }
}
  ?>
  <div class="w3-right">
	ยินดีต้อนรับ <?=$name?>  
	<?PHP 
	if(!empty($token_data)){
		echo $token_data['office'];
		if($token_data['role']=='admin')
		echo '(<a href="'.base_url("login/users").'" >รายชื่อผู้ใช้งาน</a>)';
	}
	
	?>
	(<a href="<?PHP echo base_url("login/chpass");?>" >เปลี่ยนรหัส</a>)
	(<a href="<?PHP echo base_url("login/logout");?>" >ออกจากระบบ</a>)</div>
</div>