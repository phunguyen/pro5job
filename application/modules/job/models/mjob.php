<?php
class Mjob extends CI_Model{
	protected $_table = "jobs";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_ask_cats() {
		$query = "SELECT * FROM asks_cats";
		$res = $this->db->query($query);
		return $res->result_array();
	}
}