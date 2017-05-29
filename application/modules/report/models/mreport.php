<?php
class Mreport extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_ask_cats() {
		$query = "SELECT * FROM asks_cats";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function list_asks() {
		$query = "SELECT a.*, COUNT(*) count_asks FROM asks a
			LEFT JOIN job_ask_rel r ON r.ask_id = a.ask_id
			WHERE r.job_id IS NOT NULL
			GROUP BY a.ask_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}
}