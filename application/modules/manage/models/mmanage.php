<?php
class Mmanage extends CI_Model{
	protected $_table = "news";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function listall(){
		return $this->db->get($this->_table)->result_array();
	}
	public function get_late_news($limit){
		$this->db->select("news_title");
		$this->db->limit($limit);
		return $this->db->get($this->_table)->result_array();
	}
}