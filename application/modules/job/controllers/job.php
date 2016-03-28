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
		$data['list_asks'] = $this->mjob->get_asks();
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
			// save job
			$data['job_name'] = $this->input->post('job_name');
			$data['job_contact'] = $this->input->post('job_contact');
			$data['user_id'] = $this->ion_auth->get_user_id();
			$this->mjob->update($id, $data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$this->mjob->link_job_ask($id, $selected_asks);

			// redirect
			redirect('job', 'refresh');
		}

		// view
		$data['ask_cats'] = $this->mjob->get_ask_cats();
		$data['list_asks'] = $this->mjob->get_asks();
		$data['list_jobs'] = $this->mjob->list_jobs($this->ion_auth->get_user_id());
		$data['job_data'] = $this->mjob->read($id);
		$linked_asks = $this->mjob->get_linked_asks($id);
		$a_linked_asks = array();
		foreach($linked_asks as $val) {
			$a_linked_asks[] = $val['ask_id'];
		}
		$data['linked_asks'] = $a_linked_asks;
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}
}