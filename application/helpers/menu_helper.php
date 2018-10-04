<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('incase_menu'))
{
	function incase_menu($case_id,$num=0,$option=array(),$appoint_id=null){
		//สร้าง array() เพื่อทำเมนู
		$menu = array();
		array_push($menu,array('text'=>'จำเลย/ประกันตัว','link'=>base_url('ccase/accused/'.$case_id),'css'=>($num==1)?'w3-black':''));
		array_push($menu,array('text'=>'โจทก์','link'=>base_url('ccase/prosecutor/'.$case_id),'css'=>($num==2)?'w3-black':''));
		array_push($menu,array('text'=>'ชั้นพิจารณา','link'=>base_url('JudgementAppoint/appoint/'.$case_id),'css'=>($num==4)?'w3-black':''));
		array_push($menu,array('text'=>'ประกันตัว(ชั้นพิจารณา)','link'=>base_url('release/bycase/'.$case_id),'css'=>($num==11)?'w3-black':''));
		array_push($menu,array('text'=>'ผลการพิจารณา','link'=>base_url('ccase/judgement/'.$case_id),'css'=>($num==10)?'w3-black':''));
		array_push($menu,array('text'=>'ชั้นอุทธรณ์','link'=>base_url('appeal/appeal/'.$case_id),'css'=>($num==5)?'w3-black':''));
		if(!empty($option['appeal'])){
			array_push($menu,array('text'=>'วันนัดชั้นอุทธรณ์','link'=>base_url('SupremeAppoint/appoint/'.$case_id."/".$option['appeal']),'css'=>($num==8)?'w3-black':''));
		if(!empty($option['appoint_id'])){
			array_push($menu,array('text'=>'เลื่อนนัดชั้นอุทธรณ์','link'=>base_url('SupremeChangeAppoint/changeappoint/'.$case_id."/".$option['appeal']."/".$option['appoint_id']),'css'=>($num==9)?'w3-black':''));
		
		}
		}
		array_push($menu,array('text'=>'ชั้นฏีกา','link'=>base_url('supreme/index/'.$case_id),'css'=>($num==6)?'w3-black':''));
		if(!empty($option['supreme'])){
		array_push($menu,array('text'=>'วันนัดชั้นฏีกา','link'=>base_url('SupremeAppoint/appoint/'.$case_id."/".$option['supreme']),'css'=>($num==8)?'w3-black':''));
		if(!empty($option['appoint_id'])){
			array_push($menu,array(
				'text'=>'เลื่อนนัดชั้นฏีกา',
				'link'=>base_url('SupremeChangeAppoint/changeappoint/'.$case_id."/".$option['supreme']."/".$option['appoint_id']),
				'css'=>($num==9)?'w3-black':''));
			
			}
		}
		//array_push($menu,array('text'=>'ชั้นฝากขัง','link'=>base_url('imprison/index/'.$case_id),'css'=>($num==7)?'w3-black':''));
		return($menu);
	}	

}
if ( ! function_exists('firstpage_menu'))
{
	function firstpage_menu($num=0){ 
		//สร้าง array() เพื่อทำเมนู 
		$menu = array(); 
		array_push($menu,array('text'=>'ชั้นฝากขัง','link'=>base_url('BeforeImprison/index'),'css'=>($num==7)?'w3-black':'')); 
		array_push($menu,array('text'=>'ข้อมูลคดี','link'=>base_url('ccase'),'css'=>($num==1)?'w3-black':'')); 
		return($menu); 
	   }
}
?>