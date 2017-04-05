<?php
class Feedback extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model(array("mfeedback"));
	}

	public function index() {
		$data['list_feedbacks'] = $this->mfeedback->listall();
		$this->template->write("title", "Danh sách góp ý");
        $this->template->write_view("content", "feedback", $data);
        $this->template->render();
	}

	public function create() {
		$data['feedback_content'] = $this->input->post('feedback_content');
		$this->mfeedback->create($data);
	}
}