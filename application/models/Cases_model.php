<?php
Class Cases_model extends CI_model{
	function _construct() {
		parent::_construct();	
	}
	
	function get_case($case_id){
		$this->db->select('*');
		$this->db->where('case.id', $case_id);
		$this->db->join('casetype', 'case.casetype = casetype.id');
		$this->db->join('before_imprisoned', 'case.before_imprisoned = before_imprisoned.id');
		$user_data = $this->db->get('case')->row_array();
		//echo $this->db->last_query();
		if (isset($user_data)){
			return $user_data;
		}else{
			return null;
		}
	}
	function checkcaseowner($case_id,$office_id){
		//select by case_id
		$this->db->select('*');
		$this->db->where('id', $case_id);
		$user_data = $this->db->get('case')->row_array();
		//echo $this->db->last_query();
		if (isset($user_data)){
			if($office_id == $user_data['sector'])return true;
			else return false;
		}else{
			return false;
		}
		return false;
	}
	function checkcaseowner2($case_id,$token){
		//select by case_id
		$this->db->select('*');
		$this->db->where('id', $case_id);
		$user_data = $this->db->get('case')->row_array();
		//echo $this->db->last_query();
		if (isset($user_data)){
			if($token['office_id'] == $user_data['sector']||$token['role']=='admin')return true;
			else return false;
		}else{
			return false;
		}
		return false;
	}
}
