<?php

set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH."libraries/Simple_html_dom.php";

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
		var_dump($h);
		if (!empty($h) && strpos($h[0],"304") !== FALSE)
			return false;
		else
			return true;
	}

	private function getModifiedDate($url)
	{
		$url = str_replace("http:", "https:", $url);
		$h = get_headers($url, 1);
		//var_dump($h);
		if (!empty($h))
			return $h['Last-Modified'];
	}
}
