<?php
class Job extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model(array("mjob"));
	}

	public function index() {
		$ask_cats = $this->mjob->get_ask_cats();
		$data['ask_cats'] = $ask_cats;
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}
}