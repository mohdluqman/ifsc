<?php

set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '-1');
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
		//52 banks ifsc complete on 14-06-2016
		//$que = $this->db->get_where("records",array("id >" => "124"));
		$res = $que->result_array();
		foreach ($res as $result) {			
			$url = str_replace("http:", "https:", $result["url"]);
			$tempfile = sys_get_temp_dir()."/".$result["id"];
			if(file_exists($tempfile)) unlink($tempfile);
			$data = file_put_contents($tempfile,file_get_contents($url));
			$data = $this->parseExcelFile($tempfile);
			//$val = array();
			for($i=2;$i<count($data);$i++) {
				//$val[$i-2] = array(
				$temp = array(
					"ifsc" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"micr" => isset($data[$i]["C"]) ? strval($data[$i]["C"]) : "",
					"branch" => isset($data[$i]["D"]) ? $data[$i]["D"] : "",
					"address" => isset($data[$i]["E"]) ? $data[$i]["E"] : "",
					"contact" => isset($data[$i]["F"]) ? strval($data[$i]["F"]) : "",
					"city" => isset($data[$i]["G"]) ? $data[$i]["G"] : "",
					"district" => isset($data[$i]["H"]) ? $data[$i]["H"] : "",
					"state" => isset($data[$i]["I"]) ? $data[$i]["I"] : "",
					"bank_id" => $result["id"]
					);
				//$this->db->insert("bank_detail",$temp);
			}
			//var_dump($val);
			
		}
	}

	public function parseByFile()
	{
		$tempfile = APPPATH."/controllers/ifsc.xls";
		$data = $this->parseExcelFile($tempfile);
		for($i=2;$i<count($data);$i++) {
				//$val[$i-2] = array(
				$temp = array(
					"ifsc" => isset($data[$i]["B"]) ? $data[$i]["B"] : "",
					"micr" => isset($data[$i]["C"]) ? strval($data[$i]["C"]) : "",
					"branch" => isset($data[$i]["D"]) ? $data[$i]["D"] : "",
					"address" => isset($data[$i]["E"]) ? $data[$i]["E"] : "",
					"contact" => isset($data[$i]["F"]) ? strval($data[$i]["F"]) : "",
					"city" => isset($data[$i]["G"]) ? $data[$i]["G"] : "",
					"district" => isset($data[$i]["H"]) ? $data[$i]["H"] : "",
					"state" => isset($data[$i]["I"]) ? $data[$i]["I"] : "",
					"bank_id" => "123"
					);
				$this->db->insert("bank_detail",$temp);
			}
	}

	public function parseExcelFile($fileName='')
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
