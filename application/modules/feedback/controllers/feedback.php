<?php
class Feedback extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model(array("mfeedback"));
	}

	public function index() {
		$this->template->write("title", "Giới thiệu về Pro5Job");
        $this->template->write_view("content", "about_us");
        $this->template->render();
	}

	public function create() {
		$data['feedback_content'] = $this->input->post('feedback_content');
		$this->mfeedback->create($data);
	}
}