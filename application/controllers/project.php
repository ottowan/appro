<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		// $this->load->model('Cases_model','cases');
		$this->load->helper('datehelp');
	}
	
	public function _example_output($output = null)
	{
		$this->load->view('arch',(array)$output);
	}



	public function admin(){
		if(!($token_data=checkuser('admin')))show_404();

		$header='';
		$link = base_url('project');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('project');
            $crud->set_subject('ข้อมูลโปรแกรม/ซอฟต์แวร์');
            //$office_id=$token_data['office_id'];
			//$crud->where('sector', $token_data['office_id']);

			$crud->set_relation('department_id','department','name', null,'department.name ASC');
			$crud->set_relation('office_id','office','name',  null,'office.name ASC');
			$crud->set_relation('architecture_id','architecture','name',  null,'architecture.name ASC');
			$crud->set_relation('database_id','database','name',  null,'database.name ASC');
			$crud->set_relation('technology_id','technology','name',  null,'technology.name ASC');


			$crud->set_relation('start_dev_month','month','{name}',  null,'month.id ASC');
			$crud->set_relation('end_dev_month','month','{name}',  null,'month.id ASC');		
			

			$crud->set_relation('start_used_day','day','{name}',  null,'day.id ASC');
			$crud->set_relation('start_used_month','month','{name}',  null,'month.id ASC');
			
		
			$crud->set_relation('director_techno_person_id','techno_person','{titlename}{firstname} {lastname}',  null,'techno_person.id ASC');
			$crud->set_relation('director_position_level_id','position_level','{name}',  null,'position_level.id ASC');
			$crud->set_relation('director_position_level_2_id','position_level','{name}',  null,'position_level.id ASC');

			$crud->set_relation('leader_techno_person_id','techno_person','{titlename}{firstname} {lastname}',  null,'techno_person.id ASC');
			$crud->set_relation('leader_position_level_id','position_level','{name}',  null,'position_level.id ASC');

			$crud->set_relation('inspector_techno_person_id','techno_person','{titlename}{firstname} {lastname}',  null,'techno_person.id ASC');
			$crud->set_relation('inspector_position_level_id','position_level','{name}',  null,'position_level.id ASC');

			$crud->set_relation('director_inspect_day','day','{name}',  null,'day.id ASC');
			$crud->set_relation('director_inspect_month','month','{name}',  null,'month.id ASC');
			
			$crud->set_relation('leader_inspect_day','day','{name}',  null,'day.id ASC');
			$crud->set_relation('leader_inspect_month','month','{name}',  null,'month.id ASC');

			$crud->set_relation('inspect_day','day','{name}',  null,'day.id ASC');
			$crud->set_relation('inspect_month','month','{name}',  null,'month.id ASC');
	
			
			//List page
            $crud->columns(
				'office_id',
				'doc_no',
				'name',
				'is_duplicate',
				'status',
				'createdAt',
				'updatedAt'
			);
			$crud->order_by('createdAt','asc');
			
			//Set require
			$crud->required_fields(
				'doc_no',
				'name'
			);
			
			$crud->field_type('created_uid', 'hidden',$token_data['uid']);

			//$crud->field_type('case', 'hidden',$case_id);



			//Input page
			$crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');

			//$crud->field_type('callow','enum',array('อนุญาต', ''));
			
			
			//display field/column
			$crud->display_as('department','กลุ่มศาล');
            $crud->display_as('office','ศาล');
			

			
			//Call merge rows
			$crud->display_as('department_id','สังกัดภาค');		
			$crud->display_as('office_id','ศาล');	
			$crud->display_as('doc_no','เลขหนังสือ');	

			$crud->display_as('architecture_id','สถาปัตยกรรมในการพัฒนาโปรแกรม');
			$crud->display_as('architecture_other','สถาปัตยกรรมอื่นๆ(โปรดระบุ)');	
			$crud->display_as('database_id','ฐานข้อมูลที่ใช้ในการพัฒนา');
			$crud->display_as('database_other','ฐานข้อมูลอื่นๆ(โปรดระบุ)');
			$crud->display_as('technology_id','เทคโนโลยีทีนำมาใช้งาน');
			$crud->display_as('technology_other','เทคโนโลยีอื่นๆ(โปรดระบุ)');

			
			$crud->display_as('name','ชื่อโครงการ');
			$crud->display_as('start_dev_month','เริ่มพัฒนาเดือน');
			$crud->display_as('start_dev_year','เริ่มพัฒนาปี');
			$crud->display_as('end_dev_month','เสร็จเมื่อเดือน');
			$crud->display_as('end_dev_year','เสร็จสิ้นเมื่อปี');
			$crud->display_as('start_used_day','เริ่มใช้งานเมื่อวันที่');
			$crud->display_as('start_used_month','เริ่มใช้งานเมื่อเดือน');
			$crud->display_as('start_used_year','เริ่มใช้งานเมื่อปี');


			$crud->display_as('used_depertment','หน่วยงานที่ติดตั้งใช้งาน');
			$crud->display_as('used_person','กลุ่มผู้ใช้งานโปรแกรม');

			$crud->display_as('agenda_1','วัตถุประสงค์ ข้อ1');
			$crud->display_as('agenda_2','วัตถุประสงค์ ข้อ2');
			$crud->display_as('agenda_3','วัตถุประสงค์ ข้อ3');
			$crud->display_as('agenda_4','วัตถุประสงค์ ข้อ4');
			$crud->display_as('agenda_5','วัตถุประสงค์ ข้อ5');

			$crud->display_as('benefit_1','ประโยชน์ ข้อ1');
			$crud->display_as('benefit_2','ประโยชน์ ข้อ2');
			$crud->display_as('benefit_3','ประโยชน์ ข้อ3');
			$crud->display_as('benefit_4','ประโยชน์ ข้อ4');
			$crud->display_as('benefit_5','ประโยชน์ ข้อ5');
			
			$crud->display_as('process_1','การทำงานของโปรแกรม ข้อ1');
			$crud->display_as('process_2','การทำงานของโปรแกรม ข้อ2');
			$crud->display_as('process_3','การทำงานของโปรแกรม ข้อ3');
			$crud->display_as('process_4','การทำงานของโปรแกรม ข้อ4');
			$crud->display_as('process_5','การทำงานของโปรแกรม ข้อ5');
			$crud->display_as('process_6','การทำงานของโปรแกรม ข้อ4');
			$crud->display_as('process_7','การทำงานของโปรแกรม ข้อ5');
			

			$crud->display_as('is_duplicate','ความซ้ำซ้อนของโปรแกรม');
			$crud->display_as('is_duplicate_comment','ซ้ำซ้อนโปรระบุ');
			$crud->display_as('comment_dev_future','การนำระบบไปพัฒนาต่อยอดหรือเผยแพร่');
			$crud->display_as('comment_other','ข้อเสนอแนะเพิ่มเติม');
			$crud->display_as('status','ผลการตรวจสอบ');
			$crud->display_as('status_comment','ไม่เห็นชอบ(โปรดระบุ)');
			
			$crud->display_as('director_techno_person_id','ชื่อ ผอ.');
			$crud->display_as('director_position_level_id','ตำแหน่ง ผอ.');
			$crud->display_as('director_position_level_2_id','อื่นๆ(รักษาการแทน)');
			$crud->display_as('director_inspect_day','ผอ.อนุมัติวัน');
			$crud->display_as('director_inspect_month','ผอ.อนุมัติเดือน');
			$crud->display_as('director_inspect_year','ผอ.อนุมัติปี');
			$crud->display_as('leader_techno_person_id','ชื่อหัวหน้า');
			$crud->display_as('leader_position_level_id','ตำแหน่งหัวหน้า');
			$crud->display_as('leader_inspect_day','หัวหน้าอนุมัติวัน');
			$crud->display_as('leader_inspect_month','หัวหน้าอนุมัติเดือน');
			$crud->display_as('leader_inspect_year','หัวหน้าอนุมัติปี');
			$crud->display_as('inspector_techno_person_id','ชื่อผู้ตรวจสอบ');
			$crud->display_as('inspector_position_level_id','ตำแหน่งผู้ตรวจสอบ');
			$crud->display_as('inspect_day','วันตรวจสอบ');
			$crud->display_as('inspect_month','เดือนตรวจสอบ');
			$crud->display_as('inspect_year','ปีตรวจสอบ');
			
			$crud-> get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud-> get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');

			$crud->field_type('is_duplicate', 'dropdown', array( '0'=>'ยังไม่ตรวจ', '1'=>'ไม่ซ้ำ', '2'=> 'ซ้ำ'));
			$crud->field_type('status', 'dropdown', array( '0'=>'ยังไม่ตรวจ', '1'=>'ไม่ผ่าน', '2'=> 'ผ่าน'));

			$output = $crud->render();
			//$output->office=$token_data['office'];
			//var_dump($output);
			$menu = firstpage_menu(7);
			$this->load->view('header',array(
				'title'=>'ระบบรายงานตรวจสอบโปรแกรม',
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
	

	public function index(){
		if(!($token_data=checkuser()))show_404();

		if($token_data['role']=='admin')redirect('project/admin');


		$header='';
		$link = base_url('project');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('project');
            $crud->set_subject('ข้อมูลโปรแกรม/ซอฟต์แวร์');
            //$office_id=$token_data['office_id'];
			//$crud->where('sector', $token_data['office_id']);

			$crud->set_relation('architecture_id','architecture','name',  null,'architecture.name ASC');
			$crud->set_relation('database_id','database','name',  null,'database.name ASC');
			$crud->set_relation('technology_id','technology','name',  null,'technology.name ASC');

			$crud->set_relation('start_dev_month','month','{name}',  null,'month.id ASC');
			$crud->set_relation('end_dev_month','month','{name}',  null,'month.id ASC');		
			
			$crud->set_relation('start_used_day','day','{name}',  null,'day.id ASC');
			$crud->set_relation('start_used_month','month','{name}',  null,'month.id ASC');
			
	

			//List page
            $crud->columns(
				'office_id',
				'doc_no',
				'name',
				'is_duplicate',
				'status',
				'createdAt',
				'updatedAt'
			);
			$crud->order_by('createdAt','asc');
			
			//Set require
			$crud->required_fields(
				'doc_no',
				'name',
				'architecture_id',
				'database_id',
				'technology_id',
				'start_dev_month',
				'start_dev_year',
				'end_dev_month',
				'end_dev_year',
				'start_used_day',
				'start_used_month',
				'start_used_year',
				'used_depertment',
				'used_person'
				
			);


			//var_dump($token_data);
            // change typefield
			$crud->field_type('office_id', 'hidden',$token_data['office_id']);
			$crud->field_type('department_id', 'hidden',$token_data['department_id']);
			$crud->field_type('created_uid', 'hidden',$token_data['uid']);

			
			//$crud->field_type('is_duplicate', 'true_false', array( 'ไม่ซ้ำ','ซ้ำ'));
			//$crud->field_type('case', 'hidden',$case_id);

			
			$crud->field_type('is_duplicate', 'dropdown', array( '0'=>'ยังไม่ตรวจ', '1'=>'ไม่ซ้ำ', '2'=> 'ซ้ำ'));
			$crud->field_type('status', 'dropdown', array( '0'=>'ยังไม่ตรวจ', '1'=>'ไม่ผ่าน', '2'=> 'ผ่าน'));
			

			//Input page
			$crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');

			//$crud->field_type('callow','enum',array('อนุญาต', ''));
			
			
			//display field/column
			$crud->display_as('department','กลุ่มศาล');
            $crud->display_as('office','ศาล');
			

			
			//Call merge rows			
			$crud->unset_fields(
				array(
					'is_duplicate',
					'is_duplicate_comment',
					'comment_dev_future',
					'comment_other',
					'status',
					'status_comment',
					'director_techno_person_id',
					'director_position_level_id',
					'director_position_level_2_id',
					'director_inspect_day',
					'director_inspect_month',
					'director_inspect_year',
					'leader_techno_person_id',
					'leader_position_level_id',
					'leader_inspect_day',
					'leader_inspect_month',
					'leader_inspect_year',
					'inspector_techno_person_id',
					'inspector_position_level_id',
					'inspect_day',
					'inspect_month',
					'inspect_year'

				)
			);


			$crud->display_as('doc_no','เลขหนังสือ');	

			$crud->display_as('architecture_id','สถาปัตยกรรมในการพัฒนาโปรแกรม');
			$crud->display_as('architecture_other','สถาปัตยกรรมอื่นๆ(โปรดระบุ)');	
			$crud->display_as('database_id','ฐานข้อมูลที่ใช้ในการพัฒนา');
			$crud->display_as('database_other','ฐานข้อมูลอื่นๆ(โปรดระบุ)');
			$crud->display_as('technology_id','เทคโนโลยีทีนำมาใช้งาน');
			$crud->display_as('technology_other','เทคโนโลยีอื่นๆ(โปรดระบุ)');

			
			$crud->display_as('name','ชื่อโครงการ');
			$crud->display_as('start_dev_month','เริ่มพัฒนาเดือน');
			$crud->display_as('start_dev_year','เริ่มพัฒนาปี');
			$crud->display_as('end_dev_month','เสร็จเมื่อเดือน');
			$crud->display_as('end_dev_year','เสร็จสิ้นเมื่อปี');
			$crud->display_as('start_used_day','เริ่มใช้งานเมื่อวันที่');
			$crud->display_as('start_used_month','เริ่มใช้งานเมื่อเดือน');
			$crud->display_as('start_used_year','เริ่มใช้งานเมื่อปี');


			$crud->display_as('used_depertment','หน่วยงานที่ติดตั้งใช้งาน');
			$crud->display_as('used_person','กลุ่มผู้ใช้งานโปรแกรม');

			$crud->display_as('agenda_1','วัตถุประสงค์ ข้อ1');
			$crud->display_as('agenda_2','วัตถุประสงค์ ข้อ2');
			$crud->display_as('agenda_3','วัตถุประสงค์ ข้อ3');
			$crud->display_as('agenda_4','วัตถุประสงค์ ข้อ4');
			$crud->display_as('agenda_5','วัตถุประสงค์ ข้อ5');

			$crud->display_as('benefit_1','ประโยชน์ ข้อ1');
			$crud->display_as('benefit_2','ประโยชน์ ข้อ2');
			$crud->display_as('benefit_3','ประโยชน์ ข้อ3');
			$crud->display_as('benefit_4','ประโยชน์ ข้อ4');
			$crud->display_as('benefit_5','ประโยชน์ ข้อ5');
			
			$crud->display_as('process_1','การทำงานของโปรแกรม ข้อ1');
			$crud->display_as('process_2','การทำงานของโปรแกรม ข้อ2');
			$crud->display_as('process_3','การทำงานของโปรแกรม ข้อ3');
			$crud->display_as('process_4','การทำงานของโปรแกรม ข้อ4');
			$crud->display_as('process_5','การทำงานของโปรแกรม ข้อ5');
			$crud->display_as('process_6','การทำงานของโปรแกรม ข้อ4');
			$crud->display_as('process_7','การทำงานของโปรแกรม ข้อ5');

			$crud->display_as('is_duplicate','ความซ้ำซ้อนของโปรแกรม');
			$crud->display_as('status','ผลการตรวจสอบ');
						
			
			//พิลด์ที่ ซ่อน
			//$crud->set_rules('date_sent','วันที่คำสั่ง','required|callback_date_check');

			$crud-> get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud-> get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');



			$output = $crud->render();
			//$output->office=$token_data['office'];
			//var_dump($output);
			$menu = firstpage_menu(7);
			$this->load->view('header',array(
				'title'=>'ระบบรายงานตรวจสอบโปรแกรม',
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
	


	
	
}
