<?php
class Filter extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
	}

	public function index() {
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter");
        $this->template->render();
	}
}