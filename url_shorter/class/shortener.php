<?php
class Shortener 
{
	protected $db;

	public function __construct()
	{
		$this->db = new mysqli('localhost', 'root','', 'url_shortner');
	}

	protected function generateCode($num){
		return base_convert($num, 10, 36);
	}

	public function makeCode($url){
		$sent_url = trim($url);

		if (!filter_var($url,FILTER_VALIDATE_URL)){
			return '';
		}

		$url = $this->db->escape_string($url);

		//check if url already exists
		$exists = $this->db->query("SELECT code FROM urls WHERE url ='{$url}'");

		if($exists->num_rows){
			//return code
			return $exists->fetch_object()->code;
		}
		else{
			//insert url and code
			 $this->db->query("INSERT INTO urls(url,created) VALUES ('{$url}', NOW())");

			//generate and store url and code
			$code = $this->generateCode($this->db->insert_id);

			//update the record with the generated code
			$this->db->query("UPDATE urls SET code ='{$code}' WHERE url = '{$url}' ");

			return $code;
		}
	}

	public function getUrl($code){
		$code = $this->db->escape_string($code);
		$code = $this->db->query("SELECT url FROM urls WHERE code = '$code'");

		if($code->num_rows){
			return $code->fetch_object()->url;
		}
		return '';
	}

}

