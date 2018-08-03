<?php
Class BeforeImprisoned_model extends CI_model{
	function _construct() {
		parent::_construct();	
	}
	
	function get_before_imprisoned($before_imprisoned_id){
		$this->db->select('*');
		$this->db->where('before_imprisoned.id', $before_imprisoned_id);
		$this->db->join('casetype', 'before_imprisoned.casetype = casetype.id');
		$user_data = $this->db->get('before_imprisoned')->row_array();
		//echo $this->db->last_query();
		if (isset($user_data)){
			return $user_data;
		}else{
			return null;
		}
	}
	function checkcaseowner2($before_imprisoned_id,$token){
		//select by case_id
		$this->db->select('*');
		$this->db->where('id', $before_imprisoned_id);
		$user_data = $this->db->get('before_imprisoned')->row_array();
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
