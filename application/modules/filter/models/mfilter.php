<?php
class Mfilter extends CI_Model{
	protected $_table = "news";
	public function __construct(){
		parent::__construct();
		$this->load->database();
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
}