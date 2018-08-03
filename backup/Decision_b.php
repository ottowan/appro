<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decision extends CI_Controller {

	/*private $ftp_config = array('hostname'	=>'10.1.2.29',
						'username'	=>'decision_app',
						'password'	=>'app1327',
						'port'		=>21,
						'passive'	=>FALSE,
						'debug'		=>TRUE);*/
	private $ftp_config = array('hostname'	=>'10.1.2.21',
						'username'	=>'decision_app',
						'password'	=>'wap752c9',
						'port'		=>21,
						'passive'	=>FALSE,
						'debug'		=>TRUE);
	function __construct(){
		parent::__construct();
		//$this->load->model('File_model','files');//โหลดคราส file_Model
		$this->load->model('Decision_model','decs');//โหลดคราส user_Model
		$this->load->model('Log_model','logs');//โหลดคราส user_Model
		//$this->load->model('Settype_model','settypes');//โหลดคราส user_Model
		//$this->load->model('Payroll_model','payrolls');
		//$this->load->model('Backpay_model','backpays');
		//$this->load->model('Person_model','persons');
		//$this->load->model('Log_model','logs');//โหลดคราส log_Model
		//$this->load->model('Office_model','offices');
		//$this->load->library('encrypt');
		//$this->load->library('dhx');
		//$this->load->library('grocery_CRUD');
		//$this->load->helper('divhelp');
	}
	private function checkuser(){
		if($this->session->userdata('logged')) {
		//echo "good mr.".$_SESSION['user_fname'];
			$user_name = $this->session->userdata('user_name');
			return $this->decs->get_user($user_name);
		}else{
			$this->session->set_flashdata('msg_error','สิทธิการใช้งานไม่ถูกต้องกรุณา ใส่รหัสเข้าใช้โปรแกรม');
			redirect('user/login');
		}
	}
	public function index()
	{
		$user_data = $this->checkuser(); 
		$this->load->view('decision_form',array('user_fname'=>$user_data->name_sname));
		//$this->load->view('decision_form',array('user_fname'=>"ใครหว่า"));
		$this->load->view('footer');
	}
	//Function to check if the request is an AJAX request
	private function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		//return true;
	}
	public function search(){
		if ($this->is_ajax()) {
			$red_id = $this->input->post('r');

			$page = ($this->input->post('page'))?$this->input->post('page'):1;
			$partnumber = ($this->input->post('partnumber'))?$this->input->post('partnumber'):'';
			$TextBox2 = ($this->input->post('TextBox2'))?$this->input->post('TextBox2'):'';
			$black_id = ($this->input->post('b'))?$this->input->post('b'):'';
			$TextBox4 = ($this->input->post('TextBox4'))?$this->input->post('TextBox4'):'';
			$TextBox5 = ($this->input->post('TextBox5'))?$this->input->post('TextBox5'):'';
			$TextBox6 = ($this->input->post('TextBox6'))?$this->input->post('TextBox6'):'';
			$TextBox9 = ($this->input->post('TextBox9'))?$this->input->post('TextBox9'):'';
			$jj = ($this->input->post('jj'))?$this->input->post('jj'):'';
			$jl = ($this->input->post('jl'))?$this->input->post('jl'):'';
			$dt1 = ($this->input->post('dt1'))?$this->input->post('dt1'):'';
			$ticket = ($this->input->post('ticket'))?$this->input->post('ticket'):'';
			$TextBox11 = ($this->input->post('TextBox11'))?$this->input->post('TextBox11'):'';
			$ComboBox2 = ($this->input->post('ComboBox2'))?$this->input->post('ComboBox2'):'';
			$typedecision = ($this->input->post('typedecision'))?$this->input->post('typedecision'):'';
			$rdu = ($this->input->post('rdu'))?$this->input->post('rdu'):'';
			$rdde = ($this->input->post('rdde'))?$this->input->post('rdde'):'';
			$max = 1000;
			$min = 1000*($page-1);
				$qdata = array(	
					'partnumber'=>$partnumber,
					'TextBox2'=>$TextBox2,
					'black_id'=>$black_id,
					'red_id'=>$red_id,
					'TextBox4'=>$TextBox4,
					'TextBox5'=>$TextBox5,
					'TextBox6'=>$TextBox6,
					'TextBox9'=>$TextBox9,
					'jj'=>$jj,
					'jl'=>$jl,
					'ticket'=>$ticket,
					'dt1'=>$dt1,
					'TextBox11'=>$TextBox11,
					'ComboBox2'=>$ComboBox2,
					'typedecision'=>$typedecision,
					'rdu'=>$rdu,
					'rdde'=>$rdde
					);
			//if($data = $this->decs->get_search($qdata,$min,$max)){
				$data = $this->decs->get_search($qdata,$min,$max);
				//$prepare = array();
				//foreach($data as $row){
				//	$prepare[$row->id]=array('id'=>$row->id,'black_id'=>$row->black_id);
				//}
				//echo json_encode($prepare);
				echo json_encode($data);
			/*}else{
				echo 'error on query';
			}*/
		}


	}
	public function search0(){
		if ($this->is_ajax()) {
			$red_id = $this->input->post('r');
			$partnumber = ($this->input->post('partnumber'))?$this->input->post('partnumber'):'';
			$TextBox2 = ($this->input->post('TextBox2'))?$this->input->post('TextBox2'):'';
			$black_id = ($this->input->post('b'))?$this->input->post('b'):'';
			$TextBox4 = ($this->input->post('TextBox4'))?$this->input->post('TextBox4'):'';
			$TextBox5 = ($this->input->post('TextBox5'))?$this->input->post('TextBox5'):'';
			$TextBox6 = ($this->input->post('TextBox6'))?$this->input->post('TextBox6'):'';
			$TextBox9 = ($this->input->post('TextBox9'))?$this->input->post('TextBox9'):'';
			$jj = ($this->input->post('jj'))?$this->input->post('jj'):'';
			$jl = ($this->input->post('jl'))?$this->input->post('jl'):'';
			$dt1 = ($this->input->post('dt1'))?$this->input->post('dt1'):'';
			$ticket = ($this->input->post('ticket'))?$this->input->post('ticket'):'';
			$TextBox11 = ($this->input->post('TextBox11'))?$this->input->post('TextBox11'):'';
			$ComboBox2 = ($this->input->post('ComboBox2'))?$this->input->post('ComboBox2'):'';
			$typedecision = ($this->input->post('typedecision'))?$this->input->post('typedecision'):'';
			$rdu = ($this->input->post('rdu'))?$this->input->post('rdu'):'';
			$rdde = ($this->input->post('rdde'))?$this->input->post('rdde'):'';
				$qdata = array(	'partnumber'=>$partnumber,
					'TextBox2'=>$TextBox2,
					'black_id'=>$black_id,
					'red_id'=>$red_id,
					'TextBox4'=>$TextBox4,
					'TextBox5'=>$TextBox5,
					'TextBox6'=>$TextBox6,
					'TextBox9'=>$TextBox9,
					'jj'=>$jj,
					'jl'=>$jl,
					'ticket'=>$ticket,
					'dt1'=>$dt1,
					'TextBox11'=>$TextBox11,
					'ComboBox2'=>$ComboBox2,
					'typedecision'=>$typedecision,
					'rdu'=>$rdu,
					'rdde'=>$rdde
					);
			$data = $this->decs->get_count($qdata);
				//$prepare = array();
				//foreach($data as $row){
				//	$prepare[$row->id]=array('id'=>$row->id,'black_id'=>$row->black_id);
				//}
				//echo json_encode($prepare);
				echo $data;
			//}else{
			//	echo 'error on query';
			//}
		}


	}
	public function search2(){
		if ($this->is_ajax()) {
			$id = $_GET["id"];
			if($id!=''){
			//database	//////ต้องแก้
			$result = $this->decs->get_form_id($id);
			echo json_encode($result); //*******
		}
		}
	}
	
	public function office(){
		if ($this->is_ajax()) {
			$p = ($this->input->post('p'))?$this->input->post('p'):'p0';
			if($p!=''){
			//database	//////ต้องแก้
			$mdata = array(
				"p0"=>"0",//ส่วนกลาง
				"p1"=>"1",
				"p2"=>"2",
				"p3"=>"3",
				"p4"=>"4",
				"p5"=>"5",
				"p6"=>"6",
				"p7"=>"7",
				"p8"=>"8",
				"p9"=>"9",
				"ph"=>"10",//ศาลสูง
				"ps"=>"11",//ศาลพิเศษ
				"pl"=>"12",//ศาลชำนาญพิเศษ
				"pb"=>"13" //ศาลชั้นต้นในเขตกรุงเทพ
			);
		if($result = $this->decs->get_court($mdata[$p])){
			$data = array();
			foreach($result as $row){
				array_push($data,$row->court_name);
			}
			echo json_encode($data);
		}else{
			echo 'error on query'.$p.'test';
		}


			}
		}
	}

	public function word_file(){
		$user_data = $this->checkuser(); 
		if($id = $this->input->get('d')){
			$info = $this->decs->get_file_info($id);
			
			list($filename,$filetype) = explode(".", $info->word);
			if($filetype!='doc'||$filetype!='docx')$filetype='doc';
			//$file_string = "/data/".$info->pcode."/".$filename.".".$filetype;
			$file_string = "/".$info->pcode."/".$filename.".".$filetype;
			$this->load->library('ftp');
			$this->ftp->connect($this->ftp_config);

			$this->logs->add_word($user_data,$info->case_no,$info->court);
			switch($filetype){
				case 'docx':
					header('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
					break;
				case 'doc':
					header('Content-type: application/msword');
					break;
				case 'pdf':
					header('Content-type: application/pdf');
					break;
				default:
					header('Content-type: application/msword');
			}
			header('Content-Disposition: attachment; filename="decision1.'.$filetype.'"');
			$this->ftp->download($file_string, 'php://output');
			//echo $file_string;
			//echo '   '.$filetype;
		}else echo "ไม่พบไฟล์";
	}
	public function pdf_file(){
		$user_data = $this->checkuser(); 
		if($id = $this->input->get('d')){
			$info = $this->decs->get_file_info($id);
			
			list($filename,$filetype) = explode(".", $info->pdf);
			if($filetype!='pdf')$filetype='pdf';
			//$file_string = "/data/".$info->pcode."/".$filename.".".$filetype;
			$file_string = "/".$info->pcode."/".$filename.".".$filetype;
			$this->load->library('ftp');
			$this->ftp->connect($this->ftp_config);
			$this->logs->add_pdf($user_data,$info->case_no,$info->court);
						switch($filetype){
				case 'docx':
					header('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
					break;
				case 'doc':
					header('Content-type: application/msword');
					break;
				case 'pdf':
					header('Content-type: application/pdf');
					break;
				default:
					header('Content-type: application/msword');
			}
			header('Content-Disposition: attachment; filename="decision1.'.$filetype.'"');
			$this->ftp->download($file_string, 'php://output');
			//echo $file_string;
			//echo '   '.$filetype;
		}else echo "ไม่พบไฟล์";
	}
	
	
}
