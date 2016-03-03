<?php
class Job extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));

        // layout template
        $this->template->write_view("header", "header");
        $this->template->write_view("footer", "footer");
	}

	public function index() {
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job");
        $this->template->render();
	}
}