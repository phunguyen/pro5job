<?php
class MAsk extends CI_Model{
	protected $_table = "asks";

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function list_cats() {
		$query = "SELECT * FROM asks_cats";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function list_asks() {
		$query = "SELECT a.*, c.ask_cat_name FROM asks a
			LEFT JOIN asks_cats c ON c.ask_cat_id = a.ask_cat_id";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}
}