<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S extends CI_Controller {
	private $rowlim = 30;

	//It returns all the cities
	//Very heavy, Not for use,Just for Completion
	public function get_all_cities() {
		$que = $this->db->distinct(true)->select("city")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	//It returns all the states
	public function get_all_states() {
		$que = $this->db->distinct(true)->select("state")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	//It returns all the districts
	//Very heavy, Not for use,Just for Completion
	public function get_all_districts() {
		$que = $this->db->distinct(true)->select("district")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}
	
	//It returns all the branches
	//Very heavy, Not for use,Just for Completion
	public function get_all_branchs() {
		$que = $this->db->distinct(true)->select("branch,id")->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns all the banks
	//Very heavy, Not for use,Just for Completion
	public function get_all_banks() {
		$que = $this->db->select("bank_name,id")->get("records");
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns all the state in which a bank is found
	public function get_state_from_bank() {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("bank_id",$post)) {
			echo json_encode(array("error"=>"params are missing"));
			return;
		}
		$data = array("bank_id" => $post["bank_id"]);
		$que = $this->db->distinct(true)->select("state")->where($data)->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns all the district in which a particular bank is found
	public function get_district_from_bank() {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("bank_id",$post) || !array_key_exists("state",$post)) {
			echo json_encode(array("error"=>"params are missing"));
			return;
		}
		$data = array("bank_id" => $post["bank_id"],"state" => $post["state"]);
		$que = $this->db->distinct(true)->select("district")->where($data)->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns branch from bank_id,state and district for a particular bank
	public function get_branch_from_bank() {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("bank_id",$post) || !array_key_exists("state",$post) || !array_key_exists("district",$post)) {
			echo json_encode(array("error"=>"params are missing"));
			return;
		}
		$data = array("bank_id" => $post["bank_id"],"state" => $post["state"],"district" => $post["district"]);
		$que = $this->db->select("branch,id")->where($data)->get("bank_detail");
		// echo $que;
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns the full information of a bank's branch
	public function getDetailFromId() {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("bank_id",$post) || !array_key_exists("id",$post)) {
			echo json_encode(array("error"=>"param are misiing"));
			return;
		}
		$data = array("bank_id" => $post["bank_id"],"id" => $post["id"]);
		$que = $this->db->where($data)->get("bank_detail");
		$res = $que->row_array();
		$que = $this->db->select('bank_name')->get_where("records",array("id"=>$post["bank_id"]));
		$res = array_merge($res, $que->row_array());
		echo json_encode($res);
	}

	// It returns all the districts in a state
	public function get_district_from_state($value='') {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("state",$post)) {
			echo json_encode(array("error"=>"param are misiing"));
			return;
		}
		$data = array("state" => $post["state"]);
		$que = $this->db->distinct(true)->select("district")->where($data)->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}

	//It returns all the branch in the given state and district
	public function get_branch_from_state($value='') {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("state",$post) || !array_key_exists("district",$post)) {
			echo json_encode(array("error"=>"param are misiing"));
			return;
		}
		$data = array("state" => $post["state"], "district" => $post["district"]);
		$que = $this->db->select('branch,id')->where($data)->get("bank_detail");
		$res = $que->result_array();
		echo json_encode($res);
	}

	public function get_detail_from_ifsc($value='') {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("ifsc",$post)) {
			echo json_encode(array("error"=>"param are misiing"));
			return;
		}
		$data = array("ifsc" => $post["ifsc"]);
		$que = $this->db->where($data)->get("bank_detail");
		$res = $que->row_array();
		echo json_encode($res);
	}

	public function get_detail_from_micr($value='') {
		$post = $this->input->post(NULL,TRUE);
		if(!array_key_exists("micr",$post)) {
			echo json_encode(array("error"=>"param are misiing"));
			return;
		}
		$data = array("micr" => $post["micr"]);
		$que = $this->db->where($data)->get("bank_detail");
		$res = $que->row_array();
		echo json_encode($res);
	}

	
	// public function get_all_banks() {
	// 	$rowlim = $this->rowlim;
	// 	$pg = 0;
	// 	$post = $this->input->post(NULL,TRUE);
	// 	if(array_key_exists("page",$post)) {
	// 		$pg = $post["page"];
	// 		unset($post["page"]);
	// 	}
	// 	$que = $this->db->select("bank_name,id")->limit($rowlim,$pg*$rowlim)->get("records");
	// 	$res = $que->result_array();
	// 	echo json_encode($res);
	// 	$this->db->close();
	// }

	// public function selectBank($value='')
	// {
	// 	$rowlim = $this->rowlim;
	// 	if(!empty($value)) {
	// 		$que = $this->db->get_where("records",array("id" => $value));
	// 	}
	// 	else {
	// 		$post = $this->input->post(NULL,TRUE);
	// 		if($post) {
	// 			$pg = 0;
	// 			if(array_key_exists("page",$post)) {
	// 				$pg = $post["page"];
	// 				unset($post["page"]);
	// 			}
	// 			if(array_key_exists("offset",$post)) {
	// 				$rowlim = $post["offset"];
	// 				unset($post["offset"]);
	// 			}
	// 			$que = $this->db->where($post)->limit($rowlim,$pg*$rowlim)->get("bank_detail");
	// 			echo json_encode($que->result_array());
	// 		}			
	// 	}
	// }

}
