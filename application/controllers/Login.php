<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
        //$this->load->model('login_database','logins');
        $this->load->model('admin_login','admins');
    }
    /*public function regisadmin(){
        if($this->input->get('user'))$user = $this->input->get('user');
        else show_404();
        if($this->input->get('pass'))$pass = $this->input->get('pass');
        else show_404();
        if($this->input->get('name'))$name = $this->input->get('name');
        else show_404();
        if($this->input->get('dept'))$dept = $this->input->get('dept');
        else show_404();
        $data =array(
            'sector'=>$dept,
            'username'=>$user,
            'password'=>$pass,
            'name'=>$name

        );
        if($this->admins->registration_insert($data)){
            echo 'Hello';
        }else echo 'error!';
    }*/
    public function index()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_message('required', 'โปรดใส่ %s ให้ครบถ้วน ');
        if ($this->form_validation->run() == FALSE)
        {
            $data = array(
                'title' => 'Login ระบบบันทึกข้อมูลคดีสำคัญ',
                'url'=> uri_string()
            );
            $this->load->view('login_form',$data);
        }
        else
        {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
                $result = $this->admins->login($data);
                if ($result == TRUE) {            
                    $username = $this->input->post('username');
                    $result = $this->admins->read_user_information($username);
                    if ($result != false) {
                        $session_data = array(
                            'uid' => $result['id'],
                            'username' => $result['username'],
                            'office_id' => $result['office_id'],
                            'department'=>$result['department_id'],
                            'name' => $result['name'],
                            'role' => $result['role']
                        );
                        // Add user data in session
                        $this->session->set_userdata('log_in', $session_data);
                        //var_dump($session_data);
                        //LOGIN สำเร็จ ไปไหนต่อ
                        switch($session_data['role']){
                            case 'admin':
                                redirect('verify/admin');
                                
                        }
                        redirect('verify');
                    }
                } else {
                    $data = array(
                        'title' => 'Login ระบบบันทึกข้อมูลคดีสำคัญ',
                        'error' => 'Username หรือ Password ไม่ถูกต้อง',
                        'url'=> uri_string()
                    );
                    //echo 'error';
                    $this->load->view('login_form', $data);
                }
                
            
        }

    }
    public function users(){
		if(!($token_data=checkuser('admin')))show_404();
		$header='';
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap-v4');
			$crud->set_table('user');
            $crud->set_subject('ผู้ใช้งาน');
			$crud->set_relation('office','office_id','name', null,'office.id ASC');

            $crud->columns(
				'office',
				'name',
				'email',
                'username',
				'createdAt',
				'updatedAt');
            //$crud->order_by('black_year,black_abb,black_no','asc');
            $crud->required_fields(
				'office',
                'name',
				'back_no',
                'username',
                'password');

			$crud->display_as('office','หน่วยงาน');
			$crud->display_as('name','ชื่อ');
			$crud->display_as('email','อีเมล');
			$crud->display_as('role','สิทธิเข้าใช้งาน');
			$crud->display_as('username','รหัสผู้ใช้งาน(Username)');
			$crud->display_as('password','รหัสผ่าน(Password)');
			$crud->display_as('createdAt','วันที่สร้าง');
			$crud->display_as('updatedAt','วันที่แก้ไข');
            $crud->field_type('password', 'password');				
            $crud->field_type('createdAt','invisible');
			$crud->field_type('updatedAt','invisible');
		
			//พิลด์ที่ ซ่อน
			//$crud->set_rules('date_sent','วันที่คำสั่ง','required|callback_date_check');
            $crud->unset_edit();
			$crud->get_form_validation()->set_message('numeric', 'โปรดกรอกช่อง %s เป็นตัวเลขเท่านั้น');
			$crud->get_form_validation()->set_message('required', 'โปรดกรอกช่อง %s ให้ครบถ้วน');
			//$crud->callback_before_insert(array($this,'date_normal'));
			//$crud->callback_before_update(array($this,'date_normal'));
            $crud->set_rules('username','Username','callback_check_aval');

            $crud->callback_before_insert(array($this,'encrypt_password_callback'));

            $crud->add_action('Reset รหัสผ่าน', '', 'login/resetpass', 'el el-group');
			$output = $crud->render();
			$menu = firstpage_menu(0);
			$this->load->view('header',array(
				'title'=>'โปรแกรมบันทึกข้อมูลคดีสำคัญ',
				'header'=>$header,
                'name'=>$token_data['name'],
                'token_data'=>$token_data,
				'menu'=>$menu
			));
            $this->load->view('arch',$output);
			$this->load->view('footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
    public function resetpass(){
        echo "under construct!!!";
    }
    public function chpass(){
		if(!($token_data=checkuser()))show_404();

		
		$header='';
		//read data from case id
		$link = base_url('news');
		$header ='<a href="'.$link.'" class="w3-btn w3-black">กลับ</a> ';
		//$header ='<button type="button" class="w3-btn w3-black" onclick="window.history.back();">กลับ</button> ';
        $office_id=$token_data['office_id'];
		$menu = firstpage_menu(0);
		$this->load->view('header',array(
            'title'=>'โปรแกรมบันทึกข้อมูลคดีสำคัญ',
            'header'=>$header,
            'name'=>$token_data['name'],
            'token_data'=>$token_data,
            'menu'=>$menu));
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('newpass', 'new Password', 'trim|required|xss_clean');
        $this->form_validation->set_message('required', 'โปรดใส่ %s ให้ครบถ้วน ');
        if ($this->form_validation->run() == FALSE)
        {
            $data = array(
                'url'=> uri_string()
            );
            //echo 'error';
            $this->load->view('chpass_form',$data);
        }
        else
        {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
                $result = $this->admins->login($data);
                if ($result == TRUE && $token_data['username']==$this->input->post('username') ) { 
                    //change pass           
                    $data = array(
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('newpass')
                    );
                    $result = $this->admins->changepass($data);
                    redirect('login/logout?retype=1');
                    
                } else {
                    $data = array(
                        'error' => 'Username หรือ Password ไม่ถูกต้อง',
                        'url'=> uri_string()
                    );
                    //echo 'error';
                    $this->load->view('chpass_form',$data);
                }
                
            
        }
        
		$this->load->view('footer');

    }
    // Logout from admin page
    public function logout() {
    if($this->input->get('retype'))$error="โปรดล็อคอินอีกครั้ง";
    else $error='ออกจากระบบสำเร็จ';
        // Removing session data
        $sess_array = array(
            'username' => '',
            'office_id' => '',
            'department_id'=>'',
            'office' => '',
            'name' => '',
            'role' => ''
        );
        $this->session->unset_userdata('log_in', $sess_array);
        $data['title'] = 'Logout';
        $data['error'] = $error;
        $this->load->view('logout_form', $data);
    }
    public function check_aval($str)
	{
			if ($this->admins->check_aval($str))
			{
				return TRUE;	
			}else{
                
                $this->form_validation->set_message('check_aval', 'ชื่อ Username นี้มีอยู่แล้ว โปรดเลือกชื่ออื่น');
					return FALSE;
			}		
    }
    public function encrypt_password_callback($post_array) {
        $post_array['password'] = $this->admins->hashpass($post_array['password']);        
        return $post_array;
    } 

}
