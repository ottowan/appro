<?php

Class admin_login extends CI_Model {


public function check_aval($username){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return false;
    }else{
        return true;
    }
}
public function hashpass($password){
    return password_hash($password, PASSWORD_DEFAULT);
}
// Insert registration data in database
public function registration_insert($data) {

    // Query to check whether username already exist or not
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $data['username']);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
        $data['password']=$this->hashpass($data['password']);
        // Query to insert data in database
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    } else {
        return false;
    }
}

// Read data using username and password
public function login($data) {

   // $condition = "user_name =" . "'" . $data['username'] . "'";
   //$condition = array('user_name',$data['username']);
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$data['username']);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        $result = $query->row_array();
        if (password_verify($data['password'], $result['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
public function changepass($data) {
        $changedata = array(
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        );
        $this->db->where('username',$data['username']);
        $this->db->update('user', $changedata); 
    }
// Read data from database to show data in admin page
public function read_user_information($username) {

    $this->db->select('user.id,user.office_id office,user.name,user.email,
    user.username,user.createdAt createdAt,user.updatedAt updatedAt,
    office.department_id department_id,office.name officer_name,user.role role');
    $this->db->join('office', 'user.office_id = office.id');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return $query->row_array();
    } else {
        return false;
    }
}

}

?>