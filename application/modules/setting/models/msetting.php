<?php
class Msetting extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function list_all($type) {
		$query = "SELECT * FROM {$type}";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function create($type, $data) {
		$this->db->insert($type, $data);
        return $this->db->insert_id();
	}

	public function read($type, $id) {
		$query = "SELECT * FROM {$type} WHERE id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($type, $id, $data) {
		$this->db->where('id', $id);
		$this->db->update($type, $data);
	}

	public function delete($type, $id) {
		$this->db->where('id', $id);
		$this->db->delete($type);
	}
}