<?php
class Mmanage extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function list_profiles($user_id) {
		$query = "SELECT * FROM profiles WHERE user_id = $user_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}

	public function get_profile_jobs($profile_id) {
		$query = "SELECT * FROM profile_job_rel r
			INNER JOIN jobs j ON j.job_id = r.job_id
			WHERE profile_id = $profile_id";
		$res = $this->db->query($query);
		return $res->result_array();
	}
}