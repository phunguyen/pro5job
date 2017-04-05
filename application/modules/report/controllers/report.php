<?php
class Report extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
	}

	public function index() {
		$this->template->write("title", "Thống Kê");
        $this->template->write_view("content", "report");
        $this->template->render();
	}
}