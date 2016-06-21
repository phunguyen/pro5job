<?php
class Mfilter extends CI_Model{
	protected $_table = "filters";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}

	public function read($id) {
		$query = "SELECT * FROM {$this->_table} WHERE filter_id = '$id'";
		$result = $this->db->query($query);
		return $result->row_array();
	}

	public function update($id, $data) {
		$this->db->where('filter_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		$this->db->where('filter_id', $id);
		$this->db->delete($this->_table);
	}

	public function get_filter_by_user($user_id) {
		$query = "SELECT * FROM filters WHERE `user_id` = '{$user_id}'";
		$res = $this->db->query($query);
		return $res->row_array();
	}

	public function get_sub_values($type) {
		$query = "SELECT * FROM sub_values WHERE `type` = '{$type}'";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function list_jobs($user_id) {
		$query = "SELECT * FROM jobs WHERE user_id = $user_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function list_profiles($user_id) {
		$query = "SELECT * FROM profiles WHERE user_id = $user_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function search_jobs($params) {
		$query = "SELECT * FROM jobs WHERE job_id > 0";
		$where = "";
		foreach($params as $pkey => $pvalue) {
			if($pvalue != '') {
				$where .= " AND {$pkey} LIKE '%{$pvalue}%'";
			}
		}
		$query .= $where;
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_job_asks($job_id) {
		$query = "SELECT * FROM job_ask_rel r
			INNER JOIN asks a ON a.ask_id = r.ask_id
			WHERE r.job_id = $job_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_profile_asks($profile_id) {
		$query = "SELECT * FROM profile_ask_rel r
			INNER JOIN asks a ON a.ask_id = r.ask_id
			WHERE r.profile_id = $profile_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function link_profile_jobs($profile_id, $a_jobs) {
		$query = "DELETE FROM profile_job_rel WHERE profile_id = $profile_id";
		$this->db->query($query);
		foreach ($a_jobs as $i => $job_id) {
			if($job_id != '') {
				$query = "INSERT INTO profile_job_rel VALUES ($profile_id, $job_id)";
				$this->db->query($query);
			}
		}
	}

	public function get_profile_jobs($profile_id) {
		$query = "SELECT * FROM profile_job_rel WHERE profile_id = $profile_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}
}