<?php
class Msetting extends CI_Model {
	protected $_table = 'sub_values';
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function list_all($type) {
		$query = "SELECT * FROM sub_values WHERE `type` = '$type'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}

	public function read($id) {
		$query = "SELECT * FROM {$type} WHERE id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}
}