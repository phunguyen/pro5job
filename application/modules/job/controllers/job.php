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
		$data['locations'] = $this->mjob->get_sub_values('location');
		$data['experiences'] = $this->mjob->get_sub_values('experience');
		$data['genders'] = $this->mjob->get_sub_values('gender');
		$data['graduations'] = $this->mjob->get_sub_values('graduation');
		$data['salaries'] = $this->mjob->get_sub_values('salary');
		$data['startdates'] = $this->mjob->get_sub_values('startdate');
		$data['durations'] = $this->mjob->get_sub_values('duration');
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}

	public function create() {
		$data['job_name'] = $this->input->post('job_name');
		$data['job_contact'] = $this->input->post('job_contact');
		$data['user_id'] = $this->ion_auth->get_user_id();
		$data['location'] = $this->input->post('jobsub_location');
		$data['experience'] = $this->input->post('jobsub_experience');
		$data['gender'] = $this->input->post('jobsub_gender');
		$data['graduation'] = $this->input->post('jobsub_graduation');
		$data['salary'] = $this->input->post('jobsub_salary');
		$data['startdate'] = $this->input->post('jobsub_startdate');
		$data['duration'] = $this->input->post('jobsub_duration');
		$data['description'] = $this->input->post('jobsub_description');
		$data['interest'] = $this->input->post('jobsub_interest');
		$data['other'] = $this->input->post('jobsub_other');
		$data['createdtime'] = date('Y-m-d H:i:s');
		$data['modifiedtime'] = date('Y-m-d H:i:s');
		if($data['job_name'] != '') {
			$new_id = $this->mjob->create($data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$selected_asks_require = $this->input->post('selected_asks_require');
			$selected_asks_require = explode(';', $selected_asks_require);
			$selected_asks_rating = $this->input->post('selected_asks_rating');
			$selected_asks_rating = explode(';', $selected_asks_rating);
			$this->mjob->link_job_ask($new_id, $selected_asks, $selected_asks_require, $selected_asks_rating);
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
			$data['location'] = $this->input->post('jobsub_location');
			$data['experience'] = $this->input->post('jobsub_experience');
			$data['gender'] = $this->input->post('jobsub_gender');
			$data['graduation'] = $this->input->post('jobsub_graduation');
			$data['salary'] = $this->input->post('jobsub_salary');
			$data['startdate'] = $this->input->post('jobsub_startdate');
			$data['duration'] = $this->input->post('jobsub_duration');
			$data['description'] = $this->input->post('jobsub_description');
			$data['interest'] = $this->input->post('jobsub_interest');
			$data['other'] = $this->input->post('jobsub_other');
			$data['modifiedtime'] = date('Y-m-d H:i:s');
			// echo '<pre>';print_r($data);exit;
			$this->mjob->update($id, $data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$selected_asks_require = $this->input->post('selected_asks_require');
			$selected_asks_require = explode(';', $selected_asks_require);
			$selected_asks_rating = $this->input->post('selected_asks_rating');
			$selected_asks_rating = explode(';', $selected_asks_rating);
			$this->mjob->link_job_ask($id, $selected_asks, $selected_asks_require, $selected_asks_rating);

			// redirect
			redirect('job', 'refresh');
		}

		// data
		$data['ask_cats'] = $this->mjob->get_ask_cats();
		$data['list_asks'] = $this->mjob->get_asks();
		$data['list_jobs'] = $this->mjob->list_jobs($this->ion_auth->get_user_id());
		$data['job_data'] = $this->mjob->read($id);
		$data['linked_asks'] = $this->mjob->get_linked_asks($id);
		$data['locations'] = $this->mjob->get_sub_values('location');
		$data['experiences'] = $this->mjob->get_sub_values('experience');
		$data['genders'] = $this->mjob->get_sub_values('gender');
		$data['graduations'] = $this->mjob->get_sub_values('graduation');
		$data['salaries'] = $this->mjob->get_sub_values('salary');
		$data['startdates'] = $this->mjob->get_sub_values('startdate');
		$data['durations'] = $this->mjob->get_sub_values('duration');

		// view
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "job", $data);
        $this->template->render();
	}

	public function view($id) {
		if(!$id || empty($id))
		{
			redirect('job', 'refresh');
		}

		// data
		$data['ask_cats'] = $this->mjob->get_ask_cats();
		$data['list_asks'] = $this->mjob->get_asks();
		$data['job_data'] = $this->mjob->read($id);
		$data['job_data']['location'] = $this->mjob->get_sub_value('location', $data['job_data']['location']);
		$data['job_data']['experience'] = $this->mjob->get_sub_value('experience', $data['job_data']['experience']);
		$data['job_data']['gender'] = $this->mjob->get_sub_value('gender', $data['job_data']['gender']);
		$data['job_data']['graduation'] = $this->mjob->get_sub_value('graduation', $data['job_data']['graduation']);
		$data['job_data']['salary'] = $this->mjob->get_sub_value('salary', $data['job_data']['salary']);
		// $data['job_data']['startdate'] = $this->mjob->get_sub_value('startdate', $data['job_data']['startdate']);
		// $data['job_data']['duration'] = $this->mjob->get_sub_value('duration', $data['job_data']['duration']);
		$data['linked_asks'] = $this->mjob->get_linked_asks($id);

		// view
        $this->load->view("view", $data);
        // $this->template->render();
	}

	public function delete($id) {
		if(!$id || empty($id))
		{
			redirect('job', 'refresh');
		}

		$this->mjob->delete($id);
		redirect('job','refresh');
	}

	public function add_ask() {
		// echo '<pre>';print_r($_REQUEST);echo '</pre>';
		echo Modules::run('ask/add_ask', $_REQUEST);
	}
}