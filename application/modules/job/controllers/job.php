<?php
class Job extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
	}

	public function index() {
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job");
        $this->template->render();
	}
}