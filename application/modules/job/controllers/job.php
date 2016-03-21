<?php
class Job extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mjob"));
	}

	public function index() {
		$ask_cats = $this->mjob->get_ask_cats();
		$data['ask_cats'] = $ask_cats;
		$list_jobs = $this->mjob->list_jobs($this->ion_auth->get_user_id());
		$data['list_jobs'] = $list_jobs;
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}

	public function create() {
		$data['job_name'] = $this->input->post('job_name');
		$data['job_contact'] = $this->input->post('job_contact');
		$data['user_id'] = $this->ion_auth->get_user_id();
		if($data['job_name'] != '') {
			$this->mjob->create($data);
		}
		redirect('job', 'refresh');
	}
}