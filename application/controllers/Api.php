<?php

set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH."libraries/Simple_html_dom.php";
include_once APPPATH."libraries/PHPExcel.php";

class Api extends CI_Controller {

	public function insertAllIfsc()
	{
		//$this->load->view('welcome_message');
		$html = file_get_html("https://www.rbi.org.in/scripts/bs_viewcontent.aspx?Id=2009");
		foreach($html->find('div[id=example-min] table tbody tr td a') as $element) {
			//echo $element->href . " ". $element->innertext.'<br>';
			//$last_m = $this->getModifiedDate($element->href);
			$data = array(
				"bank_name" => $element->innertext, 
				"bank_name_hash" => md5($element->innertext), 
				"url" => $element->href,
				"url_hash" => md5($element->href),
				"last_modified" => $this->getModifiedDate($element->href)
				);
			//$this->db->insert('records', $data);
		}

	}

	public function parse()
	{
		$que = $this->db->get_where("records",array("id >=" => "52"));
		$res = $que->result_array();
		foreach ($res as $result) {			
			$url = str_replace("http:", "https:", $result["url"]);
			$tempfile = sys_get_temp_dir()."/".$result["id"];
			$data = file_put_contents($tempfile,file_get_contents($url));
			$data = $this->parseXMLString($tempfile);
			//$val = array();
			for($i=2;$i<count($data);$i++) {
				//$val[$i-2] = array(
				$temp = array(
					"ifsc" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"micr" => isset($data[$i]["B"]) ? strval($data[$i]["B"]) : "",
					"branch" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"address" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"contact" => isset($data[$i]["B"]) ? strval($data[$i]["B"]) : "",
					"city" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"district" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"state" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"bank_id" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					);
				$this->db->insert("bank_detail",$temp);
			}
			//var_dump($val);
			
		}
	}

	public function parseXMLString($fileName='')
	{
		$excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
		//if we dont need any formatting on the data
		$excelReader->setReadDataOnly();
		 
		//load only certain sheets from the file
		//$loadSheets = array('Sheet1', 'Sheet2');
		//$excelReader->setLoadSheetsOnly($loadSheets);
		 
		//the default behavior is to load all sheets
		$excelReader->setLoadAllSheets();
		$objPHPExcel = $excelReader->load($fileName);
		$data = $objPHPExcel->getActiveSheet()->toArray(null, true,true,true);
		//var_dump($data[1]);
		return $data;
	}

	public function AddBankFromDb()
	{
		$query = $this->db->get('records');
		foreach ($query->result_array() as $value) {
			$str = file_get_contents($value["url"]);

		}
	}

	public function checkModified()
	{
		$query = $this->db->get('records');
		foreach ($query->result_array() as $value) {
			if($this->isModified($value["url"],$value["last_modified"])) {
				echo $value["url"]." is modified<br>";
			}
			else {
				echo $value["url"]." is not modified<br>";
			}
		}
	}

	public function get()
	{
		//echo $this->getModifiedDate("http://rbidocs.rbi.org.in/rdocs/Content/DOCs/IFCB2009_02.xls");
		$url = "https://rbidocs.rbi.org.in/rdocs/Content/DOCs/IFCB2009_02.xls";
		$h = get_headers($url, 1);
		
		if (!($h || strstr($h[0], '200') === FALSE)) {
		    return $h['Last-Modified'];
		}
	}

	private function isModified($url,$date)
	{
		$url = str_replace("http:", "https:", $url);
		stream_context_set_default(
		    array(
		        'http' => array(
		            'header' => 'If-Modified-Since: '.$date.'\r\n'
		        )
		    )
		);

		$h = get_headers($url, 1);
		if (!empty($h) && strpos($h[0],"304") !== FALSE)
			return false;
		else
			return true;
	}

	private function getModifiedDate($url)
	{
		$url = str_replace("http:", "https:", $url);
		$h = get_headers($url, 1);
		if (!empty($h))
			return $h['Last-Modified'];
	}
}
