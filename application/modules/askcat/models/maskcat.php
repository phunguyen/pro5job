<?php
class MAskCat extends CI_Model{
	protected $_table = "asks_cats";

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function list_all() {
		return $this->db->get($this->_table)->result_array();
	}

	public function list_cats() {
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

	public function read($id) {
		$query = "SELECT * FROM asks_cats WHERE ask_cat_id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($id, $data) {
		$this->db->where('ask_cat_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('ask_cat_id', $id);
		$this->db->delete($this->_table);
	}
}