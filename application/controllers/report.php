<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('grocery_CRUD');
		// $this->load->model('Cases_model','cases');
		// $this->load->helper('datehelp');
	}
	/* public function checkuser(){
		if($session_token = $this->session->userdata('log_in')){
			if($session_token['role']=='office')
				return $session_token;
		}else
		    return false;
	} */

	public function index(){
		//if(!($token_data=checkuser()))show_404();
		
		//var_dump($token_data);
		//echo "***";
        //$token_data=$this->check_session();
        
        $month = $this->input->post('month');
        $year = $this->input->post('year');


		$header='';
		try{
            $results["selected_month"] = $month; 
            $results["selected_year"] = $year; 

            $results["datas"] = $this->queryReportByDepartment($month, $year);
            $results["datas_by_sector"] = $this->queryReportBySector($month, $year);

			$this->load->view('partials/header');
			$this->load->view('report', $results);
			$this->load->view('partials/footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
    

    private function queryReportByDepartment($month, $year){


        if($month ==0 && $year ==0){
            $ext_where = " ";
        }else if($month ==0){
            $ext_where = " AND year(recieve_date) = ".$year." ";
        }else if($year ==0){
            $ext_where = " AND month(recieve_date) = ".$month." ";
        }else{
            $ext_where = " AND month(recieve_date) = ".$month." AND year(recieve_date) = ".$year." ";
        }

        //QUERY report by department
        $query = " SELECT department.name as dept_name ,COUNT(cs.id) as count_all, ";
        $query .= "SUM(cs.`casetype`=1)  as count_t1, ";
        $query .= "SUM(cs.`casetype`=2)  as count_t2, ";
        $query .= "SUM(cs.`casetype`=3)  as count_t3, ";
        $query .= "SUM(cs.`casetype`=4)  as count_t4 ";
        $query .= "FROM `case` as cs ";
        $query .= "left join department ON department.`id` = cs.`department` ";
        $query .= "left join sector ON sector.`id` = cs.`sector` "; 
        $query .= "left join casetype ON casetype.`id` = cs.`casetype` ";  
        $query .= "WHERE department.id < 99 ";
        $query .= $ext_where;
        $query .= "GROUP BY cs.department ";
        $query .= "ORDER BY cs.department ";

        //echo $query;
        return $this->db->query($query)->result();
        //print_r($results);
    }


    private function queryReportBySector($month, $year){

            if($month ==0 && $year ==0){
                $ext_where = " ";
            }else if($month ==0){
                $ext_where = " AND year(recieve_date) = ".$year." ";
            }else if($year ==0){
                $ext_where = " AND month(recieve_date) = ".$month." ";
            }else{
                $ext_where = " AND month(recieve_date) = ".$month." AND year(recieve_date) = ".$year." ";
            }

            //QUERY report by sector
            $query = " SELECT department.id as dept_id, department.name as dept_name, ";
            $query .= "sector.id as sector_id, sector.name as sector_name, ";
            $query .= "COUNT(cs.id) as count_all, ";
            $query .= "SUM(cs.`casetype`=1)  as count_t1, ";
            $query .= "SUM(cs.`casetype`=2)  as count_t2, ";
            $query .= "SUM(cs.`casetype`=3)  as count_t3, ";
            $query .= "SUM(cs.`casetype`=4)  as count_t4 ";
            $query .= "FROM `case` as cs ";
            $query .= "left join department ON department.`id` = cs.`department` ";
            $query .= "left join sector ON sector.`id` = cs.`sector` "; 
            $query .= "left join casetype ON casetype.`id` = cs.`casetype` ";  
            $query .= "WHERE department.id < 99 ";
            $query .= $ext_where;
            $query .= "GROUP BY cs.department ,cs.sector ";
            $query .= "ORDER BY cs.department ,cs.sector ";

            //echo $query;
            return $this->db->query($query)->result();        
    }

}