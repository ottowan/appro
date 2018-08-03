<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeforeAccused extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('BeforeImprisoned_model','before_imprisoned');
		$this->load->helper('datehelp');
	}

	public function checkuser(){
		if($session_token = $this->session->userdata('log_in')){
			if($session_token['role']=='office')
				return $session_token;
		}else
		    return false;
	}

	public function _example_output($output = null)
	{
		$this->load->view('arch',(array)$output);
	}

	public function index($before_imprisoned_id){
		if(!($token_data=checkuser()))show_404();
		//if(!($this->cases->checkcaseowner($case_id, $token_data['office_id'])))show_404();
		if(!($this->before_imprisoned->checkcaseowner2($before_imprisoned_id,$token_data)))show_404();
		//checkcaseowner2
		//var_dump($token_data);
		//echo "***";
		//$token_data=$this->check_session();

		//$case_data=$this->cases->get_case($case_id);
		// if(is_null($case_data)){
		// 	show_404();
		// }
		$header='';
		//read data from case id
		// $casetype =$case_data['casetype'];
		// $department =$case_data['department'];
		// $sector =$case_data['sector'];


		$case_data=$this->before_imprisoned->get_before_imprisoned($before_imprisoned_id);
		if(is_null($case_data)){
			show_404();
		}
		


		//Linkback
		$link = base_url('ccase');
		$header ='<button type="button" class="w3-btn w3-black" onclick="window.history.back();">กลับ</button> ';
		//$header ='<button type="button" class="w3-btn w3-black" onclick="window.history.back();">กลับ : ชั้นฝากขัง</button> ';
		$header .='<b>เลขดำที่</b> : '.$case_data['black_abb'].$case_data['black_no'].'/'.$case_data['black_year'];
		$header .='  <b>ประเภทคดี</b> : '.$case_data['name'].'';

		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('before_accused');
            $crud->set_subject('ผู้ต้องหา และประกันตัว');
            $office_id=$case_data['sector'];
			$crud->where('sector',$office_id);
			$crud->where('before_imprisoned',$before_imprisoned_id);
			$crud->set_relation('bailmantype','bailmantype','{name}', null, 'id ASC');
			$crud->set_relation('courttype', 'courttype', '{name}', null, 'id ASC');
			$crud->set_relation('bailtype', 'bailtype', '{name}', null, 'id ASC');
			
            $crud->columns(
				'idcard',
				'name',
				'arrest_date',
				'imprisoned_start_date',
				'has_bail',
				'release_time',
				'bail_status',
				'bail_date',
				'courttype');
            //$crud->order_by('black_year,black_abb,black_no','asc');
            //$crud->required_fields(
				//'sector',
				//'casetype',
				//'black_abb',
				//'back_no',
				//'back_year',
				//'recieve_date',
				//'accusation_tail');
            //change typefield
			$crud->field_type('has_bail', 'true_false', array( 'ไม่ยื่น','ยื่น'));
			$crud->field_type('bail_status', 'true_false', array( 'ไม่อนุญาต','อนุญาต'));
			$crud->field_type('bail_end_contract', 'true_false', array( 'หลบหนี','ถอนประกัน'));
			
 

			$crud->field_type('sector', 'hidden',$case_data['sector']);
			$crud->field_type('department', 'hidden',$case_data['department']);
			$crud->field_type('before_imprisoned', 'hidden',$before_imprisoned_id);
			$crud->field_type('department', 'hidden',$token_data['department']);
			$crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');
			//$crud->field_type('UIDAMN', 'hidden','admin');
			//$crud->unset_fields(array('DTEAMN','STS'));
			//$crud->set_field_upload('whereword','upload');
			//$crud->field_type('typedecision','enum',array('คำพิพากษา', 'คำสั่ง'));
			//$crud->field_type('callow','enum',array('อนุญาต', ''));
			
			
			//display field/column
            $crud->display_as('idcard','เลขบัตรประชาชน/เลขที่หนังสือเดินทาง');
			$crud->display_as('name','ชื่อผู้ต้องหา');			

			$crud->display_as('arrest_date','วันที่จับกุม');
			$crud->display_as('imprisoned_time','ฝากขังครั้งที่');
			$crud->display_as('imprisoned_start_date','วันที่ฝากขัง');
			$crud->display_as('imprisoned_end_date','วันครบกำหนดฝากขัง');
            $crud->display_as('release_time','ขอปล่อยตัวครั้งที่');
			
			$crud->display_as('has_bail','ยื่นคำร้องขอปล่อยตัวชั่วคราว หรือไม่');
			$crud->display_as('bailmantype','ความสัมพันธ์ระหว่างผู้ต้องหากับผู้ขอปล่อยชั่วคราว (นายประกัน)');
			$crud->display_as('bailmantype_other','ความสัมพันธ์อื่นๆ โปรดระบุ');
			$crud->display_as('bail_status','อนุญาตปล่อยตัวชั่วคราว หรือไม่');
			$crud->display_as('courttype','ศาลที่อนุญาต');
			$crud->display_as('bail_end_contract','การสิ้นสุดสัญญาประกัน');


			$crud->display_as('bail_date','วันที่อนุญาตปล่อยตัวชั่วคราว');
			$crud->display_as('bailtype','หลักประกัน');
			$crud->display_as('bail_price','ราคาประกัน(บาท)');
			$crud->display_as('bail_other','อื่นๆ(โปรดระบุ)');
			$crud->display_as('comment','หมายเหตุ');
			// $crud->display_as('createdAt','วันที่สร้าง');
			// $crud->display_as('updatedAt','วันที่แก้ไข');
	
			
			
			//พิลด์ที่ ซ่อน
			//$crud->set_rules('date_sent','วันที่คำสั่ง','required|callback_date_check');

			$crud-> get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud-> get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');
			//$crud->callback_before_insert(array($this,'date_normal'));
			//$crud->callback_before_update(array($this,'date_normal'));
			//add action
			//$crud->add_action('จำเลย', '', 'ccase/accused', 'el-book');
			//$crud->add_action('ชั้นอุทธรณ์', '', 'appeal/addappeal', 'el-book');
			//$crud->add_action('ปล่อยตัว', '', 'release/addrelease', 'el-book');	

			//$crud->add_action('ประกันตัว', '', 'BeforeRelease/index/'.$before_imprisoned_id."/", 'el el-group');
			$output = $crud->render();
			//$output->office=$token_data['office'];
			//var_dump($output);
			$menu = firstpage_menu(7);

			$this->load->view('header',array(
				'title'=>'โปรแกรมบันทึกข้อมูลคดีสำคัญ',
				'name'=>$token_data['name'],
				'token_data'=>$token_data,
				"header"=>$header, 
				"menu" => $menu ));
			$this->_example_output($output);
			$this->load->view('footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
	}


	public function date_check($str)
	{
		$token = explode('/',$str);
			if (count($token) != 3 || strlen($token[0])>2|| strlen($token[1])>2|| strlen($token[2])!=4)
			{
					$this->form_validation->set_message('date_check', 'รูปแบบวันที่ไม่ถูกต้อง โปรดกรอกวันที่ด้วยรูปแบบ วว/ดด/ปปปป  ว=วัน ด=เดือน ป=ปี พ.ศ.');
					return FALSE;
			}else{
				return TRUE;
			}

					$txt = normal_date($str);
			
	}
	public function date_normal($post_array) {
		$post_array['date_sent'] = normal_date($post_array['date_sent']);
		$encrypy = $this->encryption->encrypt($post_array['whereword']);
		$post_array['pass_pdf'] = $encrypy;
		/*if($txt = $this->encryption->decrypt($encrypy)){
			$post_array['ticket'] = $txt;
		}else{
			$post_array['ticket'] = 'false';	
		}*/
		return $post_array;
	} 


  
}
