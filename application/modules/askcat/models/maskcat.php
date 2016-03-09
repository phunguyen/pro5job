<?php
class MAskCat extends CI_Model{
	protected $_table = "asks_cats";

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function listall() {
		return $this->db->get($this->_table)->result_array();
	}

	public function listcats() {
		$query = "SELECT c.*, ac.ask_cat_name parent_cat, COUNT(a.ask_id) count_asks
			FROM asks_cats c
			LEFT JOIN asks a ON a.ask_cat_id = c.ask_cat_id
			LEFT JOIN asks_cats ac ON ac.ask_cat_id = c.ask_cat_parent
			GROUP BY c.ask_cat_id";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}
}