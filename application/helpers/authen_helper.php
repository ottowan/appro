<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('checkuser'))
{
	// Convert a string to an array with multibyte string
    function checkuser($role='office'){
        $ci = &get_instance();
      //load the session library
      //$ci->load->library('session');
		if($session_token = $ci->session->userdata('log_in')){
			if($session_token['role']==$role||$session_token['role']=='admin')
				return $session_token;
		}else
		    return false;
	}

}

?>