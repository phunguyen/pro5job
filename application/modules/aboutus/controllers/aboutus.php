<?php
class Aboutus extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
	}

	public function index() {
		$this->template->write("title", "Giới thiệu về Pro5Job");
        $this->template->write_view("content", "about_us");
        $this->template->render();
	}
}