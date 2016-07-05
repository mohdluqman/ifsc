<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S extends CI_Controller {
	private $rowlim = 30;

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
		$rowlim = $this->rowlim;
		$pg = 0;
		$post = $this->input->post(NULL,TRUE);
		if(array_key_exists("page",$post)) {
			$pg = $post["page"];
			unset($post["page"]);
		}
		$que = $this->db->select("bank_name,id")->limit($rowlim,$pg*$rowlim)->get("records");
		$res = $que->result_array();
		echo json_encode($res);
		$this->db->close();
	}

	public function selectBank($value='')
	{
		$rowlim = $this->rowlim;
		if(!empty($value)) {
			$que = $this->db->get_where("records",array("id" => $value));
		}
		else {
			$post = $this->input->post(NULL,TRUE);
			if($post) {
				$pg = 0;
				if(array_key_exists("page",$post)) {
					$pg = $post["page"];
					unset($post["page"]);
				}
				$que = $this->db->where($post)->limit($rowlim,$pg*$rowlim)->get("bank_detail");
				echo json_encode($que->result_array());
				var_dump($post);
			}			
		}
	}

}
