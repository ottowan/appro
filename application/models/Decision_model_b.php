<?php
Class Decision_model extends CI_model{
	function _construct() {
		parent::_construct();	
	}
	//SELECT user_name,user_level,name_sname FROM `tadmin` WHERE `user_name`='$username' AND `password`='$password'
	function authen_user($username,$password){
		$this->db->select('	user_name,
							user_level,
							name_sname');
		$this->db->where('user_name', $username);
		$this->db->where('SHA1(`password`)', sha1($password)); 		
		$user_data = $this->db->get('tadmin');
		
		//echo $this->db->last_query();
		if ($user_data->num_rows()>0){

			return true;
		}else{
			return false;
		}
	}
	function get_user($username){
		$this->db->select('user_name AS user_name,name_sname AS name_sname,user_level AS user_level,status AS status,tadmin.idcourtname AS idcourtname ,court_name AS court_name');
		$this->db->where('user_name', $username);
		$this->db->join('id_courtname', 'id_courtname.idcourtname = tadmin.idcourtname');
		$user_data = $this->db->get('tadmin')->row();
		//echo $this->db->last_query();
		return $user_data;
	}
	//SELECT * FROM decision_all WHERE idau='".$id."'
	function get_form_id($id){
		$this->db->select('`idau`,`c_court_code`,`pcode`,`1` AS b1,`2` AS l2,`3` AS d3, `j1`,`j1p`,`date_sent`,`j2`,`j3`,`1_2`,`1_3`,`tags`,`about_case`,`whereword`,`whereword_u`,`whereword_d`,`wherepdf`,`wherepdf_u`,`wherepdf_d`,`jj`,`jl`,`rednumber`,`utoncase`,`dekacase`,`datereaduton`,`datereaddeka`,`fnud`,`ftot`,`betweenfnud`,`betweenftot`,`date_uton_up_pdf`,`date_deka_up_pdf`,`date_lcourt_up_word`,`date_sent_eng`,`datereaduton_eng`,`datereaddeka_eng`,`casetype`,`reduton`,`reddeeka`,`caselevel`,`typedecision`,`pdf1`,`pdf2`,`pdf3`,`ticket`,`callow`');
		$this->db->where('idau', $id);	
		$data = $this->db->get('decision_all')->row();
		//echo $this->db->last_query();
		if (isset($data)){
			return $data;
		}else{
			return null;
		}	
	}

	function get_search($data,$min,$max){
		$this->db->select('`idau` AS id , `1` AS black_id');
		$this->db->like('pcode',$data['partnumber']);	
		$this->db->like('c_court_code',$data['TextBox2']);	
		$this->db->like('`1`',$data['black_id']);	
		$this->db->like('about_case',$data['TextBox4']);	
		$this->db->like('tags',$data['TextBox5']);	
		$this->db->like('j1',$data['TextBox6']);	
		$this->db->like('j1p',$data['TextBox9']);	
		$this->db->like('date_sent',$data['dt1']);	
		$this->db->like('jj',$data['jj']);	
		$this->db->like('jl',$data['jl']);	
		$this->db->like('ticket',$data['ticket']);	
		$this->db->like('`3`',$data['TextBox11']);	
		switch($data['ComboBox2']){
				case "1":
					$this->db->like('rednumber',$data['red_id']);
					break;
				case "2":
					$this->db->like('reduton',$data['rdu']);
					break;
				case "3":
					$this->db->like('reddeeka',$data['rdde']);
					break;
		}
		$this->db->like('typedecision',$data['typedecision']);
		$this->db->order_by('idau', 'DESC');
		$this->db->limit($min, $max);
		$result = $this->db->get('decision_all')->result();
		//echo $this->db->last_query();
		//if (isset($result)){
			return $result;
		//}else{
		//	return null;
		//}	
	}
	
	function get_count($data){
			$this->db->select('`idau` AS id , `1` AS black_id');
		$this->db->like('pcode',$data['partnumber']);	
		$this->db->like('c_court_code',$data['TextBox2']);	
		$this->db->like('`1`',$data['black_id']);	
		$this->db->like('about_case',$data['TextBox4']);	
		$this->db->like('tags',$data['TextBox5']);	
		$this->db->like('j1',$data['TextBox6']);	
		$this->db->like('j1p',$data['TextBox9']);	
		$this->db->like('date_sent',$data['dt1']);	
		$this->db->like('jj',$data['jj']);	
		$this->db->like('jl',$data['jl']);	
		$this->db->like('ticket',$data['ticket']);	
		$this->db->like('`3`',$data['TextBox11']);	
		switch($data['ComboBox2']){
				case "1":
					$this->db->like('rednumber',$data['red_id']);
					break;
				case "2":
					$this->db->like('reduton',$data['rdu']);
					break;
				case "3":
					$this->db->like('reddeeka',$data['rdde']);
					break;
		}
		$this->db->like('typedecision',$data['typedecision']);
		$this->db->from('decision_all');	
		return $this->db->count_all_results();
	}
	//$query = "SELECT court_name FROM id_courtname WHERE part_id=".$mdata[$p];
	function get_court($part_id){
		$this->db->select('court_name');
		$this->db->where('part_id',$part_id);	
		$result = $this->db->get('id_courtname')->result();
		//echo $this->db->last_query();
		if (isset($result)){
			return $result;
		}else{
			return null;
		}	
	}
	function get_file_info($idau){
		$this->db->select('pcode AS pcode,whereword AS pdf,wherepdf AS word,c_court_code AS court,`1` AS case_no');
		$this->db->where('idau',$idau);	
		$result = $this->db->get('decision_all')->row();
		//echo $this->db->last_query();
		if (isset($result)){
			return $result;
		}else{
			return null;
		}	
	}
}
