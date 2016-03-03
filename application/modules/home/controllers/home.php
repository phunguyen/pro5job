<?php
class Home extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));

        // layout template
        $this->template->write_view("header", "header");
        $this->template->write_view("footer", "footer");
	}

	public function index() {
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "home");
        $this->template->render();
	}
}