<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Decision_model','decs');//โหลดคราส user_Model
		$this->load->model('Log_model','logs');//โหลดคราส user_Model
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
		$page_size = 100;
		$user_data = $this->checkuser(); 
		$page = 1;$court="";$sdate="";//$sdate=date('d/m/').(date('Y')+543);
		//$page = 1;$court="";$year=(date('Y'));
		$this->form_validation->set_rules('sdate', 'วันที่', 'trim');
		$this->form_validation->set_rules('court', 'ชื่อศาล', 'trim');
		$this->form_validation->set_message('validateDate', 'รูปแบบ%sไม่ถูกต้อง');
		if ($this->form_validation->run() == TRUE){
			$court=($this->input->post('court'))?$this->input->post('court'):'';
			$sdate=($this->input->post('sdate'))?$this->input->post('sdate'):'';//date('d/m/').(date('Y')+543);
			//$year=($this->input->post('year'))?$this->input->post('year'):(date('Y'));
			$page=($this->input->post('page'))?$this->input->post('page'):1;
			$submit = $this->input->post('search_but');
			switch($submit){
				case 'ค้นหา':
					$page=1;break;
				case 'ถัดไป':
					$page++;break;
				case 'ก่อนหน้า':
					$page--;break;
				case '1':
					$page=1;break;
				default:
					$page='max';
			}
			//echo $submit.'123<br />';
		};
		$total_record = $this->logs->count_userlog(array('user'=>$user_data->user_name,'ofcourt'=>$court,'sdate'=>$sdate));
		//echo $user_data->user_name.' '.$court.' '.$year.' '.$total_record.' page'.$page;
		$total_page = ceil($total_record / $page_size);
		
		if(($page>$total_page||$page=='max')&&$total_page!=0){$page=$total_page;}
		if($page<1){$page=1;}
		//echo ' page'.$total_page;
		$record = (($page-1)*$page_size);
		$result=$this->logs->get_userlog(array('user'=>$user_data->user_name,'ofcourt'=>$court,'sdate'=>$sdate),$record,$page_size);
		$this->load->view('log_form',array('user_fname'=>$user_data->name_sname,'result'=>$result,'page'=>$page,'total_page'=>$total_page));
		$this->load->view('footer');
	}
	function validateDate($date )
	{	
		if(empty($date)) return true;
		else{
		$format = 'd/m/Y';
		$d = DateTime::createFromFormat($format, $date);
		return ($d && $d->format($format) == $date);
		}
	}
	public function test(){
		echo $this->logs->count_userlog('ujumg','','2015');
		$data = $this->logs->get_userlog('ujumg','','2015',1,10);
		foreach($data as $row){
			echo "<br />";
			echo $row->user_name;
			
		}
	}
	//Function to check if the request is an AJAX request

}

