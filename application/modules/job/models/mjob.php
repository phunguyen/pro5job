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

	public function get_asks() {
		$query = "SELECT * FROM asks";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function list_jobs($user_id) {
		$query = "SELECT * FROM {$this->_table} WHERE user_id = $user_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}

	public function read($id) {
		$query = "SELECT * FROM {$this->_table} WHERE job_id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($id, $data) {
		$this->db->where('job_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('job_id', $id);
		$this->db->delete($this->_table);
		$query = "DELETE FROM job_ask_rel WHERE job_id = $id";
		$this->db->query($query);
	}

	public function link_job_ask($job_id, $a_asks, $a_requires, $a_ratings) {
		$query = "DELETE FROM job_ask_rel WHERE job_id = $job_id";
		$this->db->query($query);
		foreach ($a_asks as $i => $ask_id) {
			if($ask_id != '') {
				$query = "INSERT INTO job_ask_rel VALUES ($job_id, $ask_id, {$a_requires[$i]}, {$a_ratings[$i]})";
				$this->db->query($query);
			}
		}
	}

	function get_linked_asks($job_id) {
		$query = "SELECT * FROM job_ask_rel WHERE job_id = $job_id";
		return $this->db->query($query)->result_array();
	}

	public function get_sub_values($type) {
		$query = "SELECT * FROM sub_values WHERE `type` = '{$type}'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_sub_value($type, $code) {
		$query = "SELECT * FROM sub_values WHERE `type` = '{$type}' AND `code` = '{$code}'";
		$res = $this->db->query($query);
		return $res->row_array();
	}
}