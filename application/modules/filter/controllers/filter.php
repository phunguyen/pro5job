<?php
class Filter extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mfilter"));
	}

	public function index() {
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter");
        $this->template->render();
	}

	public function jobs() {
		$data['locations'] = $this->mfilter->get_sub_values('location');
		$data['experiences'] = $this->mfilter->get_sub_values('experience');
		$data['genders'] = $this->mfilter->get_sub_values('gender');
		$data['graduations'] = $this->mfilter->get_sub_values('graduation');
		$data['salaries'] = $this->mfilter->get_sub_values('salary');
		$data['startdates'] = $this->mfilter->get_sub_values('startdate');
		$data['durations'] = $this->mfilter->get_sub_values('duration');
		$data['list_profiles'] = $this->mfilter->list_profiles($this->ion_auth->get_user_id());
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter_jobs", $data);
        $this->template->render();
	}

	public function profiles() {
		$data['locations'] = $this->mfilter->get_sub_values('location');
		$data['experiences'] = $this->mfilter->get_sub_values('experience');
		$data['genders'] = $this->mfilter->get_sub_values('gender');
		$data['graduations'] = $this->mfilter->get_sub_values('graduation');
		$data['salaries'] = $this->mfilter->get_sub_values('salary');
		$data['startdates'] = $this->mfilter->get_sub_values('startdate');
		$data['durations'] = $this->mfilter->get_sub_values('duration');
		$data['list_jobs'] = $this->mfilter->list_jobs($this->ion_auth->get_user_id());
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter_profiles", $data);
        $this->template->render();
	}

	public function search() {
		$search_mapping = array(
			'filter_location' => 'location',
			'filter_experience' => 'experience',
			'filter_gender' => 'gender',
			'filter_graduation' => 'graduation',
			'filter_salary' => 'salary',
		);
		$search_params = array();
		foreach($search_mapping as $pname => $fname) {
			if(isset($_REQUEST[$pname])) {
				$search_params[$fname] = $_REQUEST[$pname];
			}
		}
		$search_result = $this->mfilter->search_jobs($search_params);
		$search_result = $this->calculateMatch($_REQUEST['filter_profile'], $search_result);
		echo json_encode($search_result);
	}

	public function calculateMatch($profile_id, $jobs) {
		$profile_asks = $this->mfilter->get_profile_asks($profile_id);
		foreach($jobs as $job) {
			$job_asks = $this->mfilter->get_job_asks($job['job_id']);
		}

		return $jobs;
	}
}