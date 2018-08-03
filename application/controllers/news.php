<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('Cases_model','cases');
		$this->load->helper('datehelp');
	}
	public function _example_output($output = null)
	{
		$this->load->view('arch',(array)$output);
	}

	public function index(){
		echo "Hello GroceryCRUD";
	}


	
	/*
	public function index(){
		if(!($token_data=checkuser()))show_404();
		if($token_data['role']=='admin')redirect('BeforeImprison/admin');

		$header='';
		//read data from case id
		// $casetype =$case_data['casetype'];
		// $department =$case_data['department'];
		// $sector =$case_data['sector'];
		$link = base_url('news');
		// $header ='<a href="'.$link.'" class="w3-btn w3-black">กลับ</a> ';
		// $header .='ข้อมูลจำเลยของคดีหมายเลข '.$case_data['black_abb'].$case_data['black_no'].'/'.$case_data['black_year'];
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('news');
            $crud->set_subject('ข้อมูลชั้นฝากขัง');
            //$office_id=$token_data['office_id'];
			$crud->where('sector', $token_data['office_id']);

			//$crud->set_relation('bailtype','bailtype','{name}');
			$crud->set_relation('casetype','casetype','({abb}) : {name}');
		
			
			//List page
            $crud->columns(
				'casetype',
				'black_num_full',
				'requester_name',
				'comment',
				'createdAt',
				'updatedAt');
			$crud->order_by('black_year, black_abb, black_no','asc');
			
			//Set require
			$crud->required_fields(
			'casetype',
			'black_abb',
			'black_no',
			'black_year'
			);


            //change typefield
			$crud->field_type('sector', 'hidden',$token_data['office_id']);
			$crud->field_type('department', 'hidden',$token_data['department']);
			$crud->field_type('cr_uid', 'hidden',$token_data['uid']);

			//$crud->field_type('case', 'hidden',$case_id);



			//Input page
			$crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');
			//$crud->field_type('UIDAMN', 'hidden','admin');
			//$crud->unset_fields(array('DTEAMN','STS'));
			//$crud->set_field_upload('whereword','upload');
			//$crud->field_type('typedecision','enum',array('คำพิพากษา', 'คำสั่ง'));
			//$crud->field_type('callow','enum',array('อนุญาต', ''));
			
			
			//display field/column
            $crud->display_as('black_abb','เลขคดีดำ[อักษรย่อ]');
            $crud->display_as('black_no','เลขคดีดำ[ลำดับ]');
			$crud->display_as('black_year','เลขคดีดำ[ปี]');
			

			
			//Call merge rows
			$crud->unset_columns('black_abb', 'black_no', 'black_year');
			$crud->callback_column('black_num_full',array($this,'_cb_col_black_num_full'));
			$crud->display_as('black_num_full','เลขดำที่');

            $crud->display_as('casetype','ประเภทคดี');

			
			$crud->display_as('requester_name','ชื่อผู้ร้อง');

			$crud->display_as('comment','หมายเหตุ');
			$crud->display_as('createdAt','วันที่สร้าง');
			$crud->display_as('updatedAt','วันที่แก้ไข');
	
			
			//พิลด์ที่ ซ่อน
			//$crud->set_rules('date_sent','วันที่คำสั่ง','required|callback_date_check');

			$crud-> get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud-> get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');

			//$crud->callback_before_insert(array($this,'date_normal'));
			//$crud->callback_before_update(array($this,'date_normal'));
			$crud->add_action('ผู้ต้องหา', '', 'BeforeAccused/index', 'el el-group');
			$crud->callback_after_insert(array($this, 'after_insert_callback'));

			$output = $crud->render();
			//$output->office=$token_data['office'];
			//var_dump($output);
			$menu = firstpage_menu(7);
			$this->load->view('header',array(
				'title'=>'โปรแกรมบันทึกข้อมูลคดีสำคัญ',
				'header'=>$header,
				'name'=>$token_data['name'],
				'token_data'=>$token_data,
				'menu'=>$menu));
			$this->_example_output($output);
			$this->load->view('footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
	}
*/

	public function admin(){
		if(!($token_data=checkuser('admin')))show_404();
		//if(!($this->cases->checkcaseowner($case_id,$token_data['office_id'])))show_404();
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
		$link = base_url('news');
		// $header ='<a href="'.$link.'" class="w3-btn w3-black">กลับ</a> ';
		// $header .='ข้อมูลจำเลยของคดีหมายเลข '.$case_data['black_abb'].$case_data['black_no'].'/'.$case_data['black_year'];
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('before_imprisoned');
            $crud->set_subject('ข้อมูลชั้นฝากขัง');
            //$office_id=$token_data['office_id'];
			//$crud->where('sector', $token_data['office_id']);

			$crud->set_relation('department','department','name',array('id <' => 99),'department.name ASC');
			$crud->set_relation('sector','sector','name',  array('department <' => 99),'sector.name ASC');
			//$crud->set_relation('bailtype','bailtype','{name}');
			$crud->set_relation('casetype','casetype','({abb}) : {name}');
		
			
			//List page
            $crud->columns(
				'department',
				'sector',
				'casetype',
				'black_num_full',
				'requester_name',
				'comment',
				'createdAt',
				'updatedAt');
			$crud->order_by('department,sector,black_year, black_abb, black_no','asc');
			
			//Set require
			$crud->required_fields(
			'department',
			'sector',
			'casetype',
			'black_abb',
			'black_no',
			'black_year'
			);


            //change typefield
			//$crud->field_type('sector', 'hidden',$token_data['office_id']);
			//$crud->field_type('department', 'hidden',$token_data['department']);
			
			$crud->field_type('cr_uid', 'hidden',$token_data['uid']);

			//$crud->field_type('case', 'hidden',$case_id);



			//Input page
			$crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');
			//$crud->field_type('UIDAMN', 'hidden','admin');
			//$crud->unset_fields(array('DTEAMN','STS'));
			//$crud->set_field_upload('whereword','upload');
			//$crud->field_type('typedecision','enum',array('คำพิพากษา', 'คำสั่ง'));
			//$crud->field_type('callow','enum',array('อนุญาต', ''));
			
			
			//display field/column
			$crud->display_as('department','กลุ่มศาล');
            $crud->display_as('sector','ศาล');
            $crud->display_as('black_abb','เลขคดีดำ[อักษรย่อ]');
            $crud->display_as('black_no','เลขคดีดำ[ลำดับ]');
			$crud->display_as('black_year','เลขคดีดำ[ปี]');
			

			
			//Call merge rows
			$crud->unset_columns('black_abb', 'black_no', 'black_year');
			$crud->callback_column('black_num_full',array($this,'_cb_col_black_num_full'));
			$crud->display_as('black_num_full','เลขดำที่');

            $crud->display_as('casetype','ประเภทคดี');

			
			$crud->display_as('requester_name','ชื่อผู้ร้อง');

			$crud->display_as('comment','หมายเหตุ');
			$crud->display_as('createdAt','วันที่สร้าง');
			$crud->display_as('updatedAt','วันที่แก้ไข');
	
			
			//พิลด์ที่ ซ่อน
			//$crud->set_rules('date_sent','วันที่คำสั่ง','required|callback_date_check');

			$crud-> get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud-> get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');

			//$crud->callback_before_insert(array($this,'date_normal'));
			//$crud->callback_before_update(array($this,'date_normal'));
			$crud->add_action('ผู้ต้องหา', '', 'BeforeAccused/index', 'el el-group');
			$crud->callback_after_insert(array($this, 'after_insert_callback'));

			$output = $crud->render();
			//$output->office=$token_data['office'];
			//var_dump($output);
			$menu = firstpage_menu(7);
			$this->load->view('header',array(
				'title'=>'โปรแกรมบันทึกข้อมูลคดีสำคัญ',
				'header'=>$header,
				'name'=>$token_data['name'],
				'token_data'=>$token_data,
				'menu'=>$menu));
			$this->_example_output($output);
			$this->load->view('footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
	}	

	//Merge rows for display
	public function _cb_col_black_num_full($value, $row){
		$str = $row->black_abb.'.'.$row->black_no.'/'.$row->black_year;
		return $str;
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

	private function after_insert_callback($post_array,$primary_key)
	{
			log_message('debug', 'SQL: '.$this->db->last_query());
	}



	
	
}
