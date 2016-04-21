<?php
class Mprofile extends CI_Model{
	protected $_table = "profiles";
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

	public function list_profiles($user_id) {
		$query = "SELECT * FROM {$this->_table} WHERE user_id = $user_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}

	public function read($id) {
		$query = "SELECT * FROM {$this->_table} WHERE profile_id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($id, $data) {
		$this->db->where('profile_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('profile_id', $id);
		$this->db->delete($this->_table);
		$query = "DELETE FROM profile_ask_rel WHERE profile_id = $id";
		$this->db->query($query);
	}

	public function link_profile_ask($profile_id, $a_asks, $a_ratings) {
		$query = "DELETE FROM profile_ask_rel WHERE profile_id = $profile_id";
		$this->db->query($query);
		foreach ($a_asks as $i => $ask_id) {
			if($ask_id != '') {
				$query = "INSERT INTO profile_ask_rel VALUES ($profile_id, $ask_id, {$a_ratings[$i]})";
				$this->db->query($query);
			}
		}
	}

	function get_linked_asks($profile_id) {
		$query = "SELECT * FROM profile_ask_rel WHERE profile_id = $profile_id";
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