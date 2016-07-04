<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S extends CI_Controller {
	public function get_all_cities() {
		$que = $this->db->distinct(true)->select("city")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	public function get_all_states() {
		$que = $this->db->distinct(true)->select("state")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	public function get_all_districts() {
		$que = $this->db->distinct(true)->select("district")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	public function get_all_branchs() {
		$que = $this->db->distinct(true)->select("branch,id")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	public function get_all_banks() {
		$que = $this->db->select("bank_name,id")->get("records");
		$res = $que->result_array();
		echo json_encode($res);
	}

	public function selectBank($value='')
	{
		if(!empty($value)) {
			$que = $this->db->get_where("records",array("id" => $value));
		}
		else {
			$post = $this->input->post(NULL,TRUE);
			$que = $this->db->where($post)->get("bank_detail");
			echo json_encode($que->result_array());
		}
	}

}
