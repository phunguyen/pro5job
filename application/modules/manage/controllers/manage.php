<?php
class Manage extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model(array("mmanage"));
	}

	public function index() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "about_us");
        $this->template->render();
	}

	public function jobs() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "jobs");
        $this->template->render();
	}

	public function profiles() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "profiles");
        $this->template->render();
	}
}