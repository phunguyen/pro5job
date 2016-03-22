<?php
class Job extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mjob"));
	}

	public function index() {
		$data['ask_cats'] = $this->mjob->get_ask_cats();
		$data['list_jobs'] = $this->mjob->list_jobs($this->ion_auth->get_user_id());
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

	public function edit($id) {
		if(!$id || empty($id))
		{
			redirect('job', 'refresh');
		}

		// save
		if (isset($_POST) && !empty($_POST)) {
			$data['job_name'] = $this->input->post('job_name');
			$data['job_contact'] = $this->input->post('job_contact');
			$data['user_id'] = $this->ion_auth->get_user_id();
			$this->mjob->update($id, $data);
			redirect('job', 'refresh');
		}

		// view
		$data['ask_cats'] = $this->mjob->get_ask_cats();
		$data['list_jobs'] = $this->mjob->list_jobs($this->ion_auth->get_user_id());
		$data['job_data'] = $this->mjob->read($id);
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}
}