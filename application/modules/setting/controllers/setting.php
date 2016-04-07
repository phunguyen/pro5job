<?php
class Setting extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model(array("msetting"));
	}

	public function index() {
		// data
		$data['locations'] = $this->msetting->list_all('location');
		$data['experiences'] = $this->msetting->list_all('experience');
		$data['graduations'] = $this->msetting->list_all('graduation');
		$data['salaries'] = $this->msetting->list_all('salary');

		// view
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "setting", $data);
        $this->template->render();
	}
}