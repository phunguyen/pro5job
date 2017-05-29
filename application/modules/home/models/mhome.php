<?php
class Mhome extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function count_records($table_name) {
		if ($table_name == 'jobs_new') {
			$query = "SELECT COUNT(*) count_records FROM jobs WHERE startdate <= DATE(NOW()) AND DATE(NOW()) <= duration";
		} else {
			$query = "SELECT count(*) count_records FROM {$table_name}";
		}
		$result = $this->db->query($query);
		return $result->row_array();
	}
}