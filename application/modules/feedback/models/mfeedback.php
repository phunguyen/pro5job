<?php
class Mfeedback extends CI_Model{
	protected $_table = "feedbacks";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function listall(){
		return $this->db->get($this->_table)->result_array();
	}

	public function create($data) {
		$this->db->insert($this->_table, $data);
        return $this->db->insert_id();
	}
}