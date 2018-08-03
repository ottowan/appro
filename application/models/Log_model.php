<?php
Class Log_model extends CI_model{
	function _construct() {
		parent::_construct();	
	}
	//ตัวอย่าง $this->logs->addlog($this->session->userdata('username'),'A','contract',$run_no);
	function addlog($username,$type,$data,$value,$person_id=0){//ชนิดเป็นได้แค่ 1 และ 2  //person_id ถ้าไม่มีใช้ 0 
		$user = $this->db->get_where('user', array('username' => $username))->row();
		$this->db->set('user',$user->id)
				 ->set('person_id',$person_id)
				 ->set('type',$type)
				 ->set('time',date('Y-m-d H:i:s'))
				 ->set('data',$data)
				 ->set('value',$value);									
		if($this->db->insert('log')){
			return true;
		}	
			//
			return false;
	}
	function add_login($user,$casenum,$ofcourt){//ชนิดเป็นได้แค่ 1 และ 2  //person_id ถ้าไม่มีใช้ 0 
		$ip = $this->input->ip_address();
		$this->db->set('usernamelog',$user->user_name)
				 ->set('ipaddress',$ip)
				 ->set('user_name',$user->name_sname)
				 ->set('level',$user->user_level)
				 ->set('court',$user->court_name)
				 ->set('casenum',$casenum)
				 ->set('ofcourt',$ofcourt)
				 ->set('isaction','login');									
		if($this->db->insert('tlog')){
			return true;
		}	
			//
			return false;
	}
	function add_word($user,$casenum,$ofcourt){//ชนิดเป็นได้แค่ 1 และ 2  //person_id ถ้าไม่มีใช้ 0 
		$year = date('Y')+543;
		$time = date('d/m/').$year.date(' H:i:s');
		$ip = $this->input->ip_address();
		$this->db->set('usernamelog',$user->user_name)
				 ->set('ipaddress',$ip)
				 ->set('user_name',$user->name_sname)
				 ->set('level',$user->user_level)
				 ->set('court',$user->court_name)
				 ->set('casenum',$casenum)
				 ->set('ofcourt',$ofcourt)
				 ->set('datepressword',$time)
				 ->set('isaction','word');									
		if($this->db->insert('tlog')){
			return true;
		}	
			//
			return false;
	}
	function add_pdf($user,$casenum,$ofcourt){//ชนิดเป็นได้แค่ 1 และ 2  //person_id ถ้าไม่มีใช้ 0 
		$year = date('Y')+543;
		$time = date('d/m/').$year.date(' H:i:s');
		$ip = $this->input->ip_address();
		$this->db->set('usernamelog',$user->user_name)
				 ->set('ipaddress',$ip)
				 ->set('user_name',$user->name_sname)
				 ->set('level',$user->user_level)
				 ->set('court',$user->court_name)
				 ->set('casenum',$casenum)
				 ->set('ofcourt',$ofcourt)
				 ->set('datepresspdf',$time)
				 ->set('isaction','pdf');									
		if($this->db->insert('tlog')){
			return true;
		}	
			//
			return false;
	}
	//$sql = "SELECT COUNT(*) AS num FROM tlog WHERE $Where ORDER BY idau DESC";
	function countlog($where=""){
		$sql = "SELECT COUNT(*) AS numrows FROM `tlog`";
		if($where)$sql .= " WHERE ".$where;
		$query = $this->db->query($sql);
        //echo $this->db->last_query();
        if ($query->num_rows() == 0)
            return '0';
        $row = $query->row();
        return $row->numrows;
	}	
	function getdata($start,$p_size=''){
		$this->db->select('*');
		$this->db->order_by("id", "desc"); 
		if(!empty($p_size))
		$this->db->limit($p_size,$start);
		//$this->db->join('office', 'office.id = user.office_id','left');
		$contain_data = $this->db->get('tlog')->result();
		//echo $this->db->last_query();
		return $contain_data;
	}

	//$this->table->set_heading('ลำดับ', 'ชื่อ-สกุล', 'หน่วยงาน','Action','วันที','เลขที่คดี','ของหน่วยงาน');
	function count_userlog($search=array('user'=>'','ofcourt'=>'','sdate'=>'')){
		$this->db->like('ofcourt',$search['ofcourt']);	
		$this->db->where('usernamelog',$search['user']);	
		if($search['sdate']!=''){
			list($day,$month,$year)=explode("/", $search['sdate']);
			$this->db->where('DATE_FORMAT( `datelog` , "%Y" )+543 =',$year);	
			$this->db->where('DATE_FORMAT( `datelog` , "%m" ) =',$month);
			$this->db->where('DATE_FORMAT( `datelog` , "%d" ) =',$day);
		}		
		$this->db->order_by('datelog', 'DESC');
		$this->db->from('tlog');	
		return $this->db->count_all_results();
	}
	function get_userlog($search=array('user'=>'','ofcourt'=>'','sdate'=>''),$start,$p_size=''){
		$this->db->query('SET @row_number:='.$start.';');
		$this->db->select('@row_number:=@row_number+1 AS id',false)
				 ->select('`ipaddress` AS ipaddress')
				 ->select('`user_name` AS user_name')
				 ->select('`court` AS court')
				 ->select('`isaction` AS isaction')
				 ->select('CONCAT(DATE_FORMAT( `datelog` , "%d/%m/" ),DATE_FORMAT( `datelog` , "%Y" )+543,DATE_FORMAT( `datelog` , " %H:%i:%S" )) AS datelog')
				 ->select('`casenum` AS casenum')
				 ->select('`ofcourt` AS ofcourt');
		$this->db->like('ofcourt',$search['ofcourt']);	
		$this->db->where('usernamelog',$search['user']);	
		if($search['sdate']!=''){
			list($day,$month,$year)=explode("/", $search['sdate']);
			$this->db->where('DATE_FORMAT( `datelog` , "%Y" )+543 =',$year);	
			$this->db->where('DATE_FORMAT( `datelog` , "%m" ) =',$month);
			$this->db->where('DATE_FORMAT( `datelog` , "%d" ) =',$day);
		}	
		$this->db->limit($p_size,$start);
		$this->db->order_by('tlog.datelog', 'DESC');
		$data = $this->db->get('tlog');//no ->result
		//echo $this->db->last_query();
		return $data;
	}

	


}

