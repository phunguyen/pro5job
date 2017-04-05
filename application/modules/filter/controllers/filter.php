<?php
class Filter extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mfilter"));
	}

	public function index() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter");
        $this->template->render();
	}

	public function jobs() {
		$user_id = $this->ion_auth->get_user_id();
		$filter_data = $this->mfilter->get_filter_by_user($user_id);
		$filter_data = json_decode($filter_data['filter_data'], true);
		$data['filter_data'] = $filter_data;
		$data['locations'] = $this->mfilter->get_sub_values('location');
		$data['experiences'] = $this->mfilter->get_sub_values('experience');
		$data['genders'] = $this->mfilter->get_sub_values('gender');
		$data['graduations'] = $this->mfilter->get_sub_values('graduation');
		$data['salaries'] = $this->mfilter->get_sub_values('salary');
		$data['startdates'] = $this->mfilter->get_sub_values('startdate');
		$data['durations'] = $this->mfilter->get_sub_values('duration');
		$data['list_profiles'] = $this->mfilter->list_profiles($this->ion_auth->get_user_id());
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
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
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "filter_profiles", $data);
        $this->template->render();
	}

	public function lists($type) {
		if($type == '') {
			redirect('/', 'refresh');
		} elseif($type == 'profile') {
			$data = '';
			$this->template->write_view("content", "list_profiles", $data);
		} else {
			$data = '';
        	$this->template->write_view("content", "list_jobs", $data);
		}
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
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
		$search_result = $this->calculateMatch($_REQUEST['filter_profile'], $search_result, $_REQUEST['filter_match']);
		$data['search_result'] = $search_result;
		$data['selected_jobs'] = $this->mfilter->get_profile_jobs($_REQUEST['filter_profile']);
		echo json_encode($data);
	}

	public function calculateMatch($profile_id, $jobs, $filter_match_point) {
		// get profile's asks
		$profile_asks = $this->mfilter->get_profile_asks($profile_id);
		$profile_asks_new = array();
		foreach($profile_asks as $pa) {
			$profile_asks_new[$pa['ask_id']] = $pa;
		}
		// calculate match points
		$jobs_result = array();
		foreach($jobs as $ji => $job) {
			$job_asks = $this->mfilter->get_job_asks($job['job_id']);
			$count_asks = 0;
			foreach($job_asks as $ja) {
				if($ja['require'] == 1) {
					if(isset($profile_asks_new[$ja['ask_id']])) {
						if($ja['rating'] <= $profile_asks_new[$ja['ask_id']]['rating']) {
							$count_asks++;
						} else {
							$count_asks = -1;
						}
					} else {
						$count_asks = -1;
					}
				} else {
					if(isset($profile_asks_new[$ja['ask_id']])) {
						if($ja['rating'] <= $profile_asks_new[$ja['ask_id']]['rating']) {
							$count_asks++;
						}
					}
				}
				if($count_asks == -1) break;
			}
			if($count_asks > 0) {
				$match_point = $count_asks / count($job_asks) * 100;
				if($match_point >= $filter_match_point) {
					$job['match_point'] = $match_point;
					$jobs_result[] = $job;
				}
			}
		}
		// order by match point
		for($i = 0;$i < count($jobs_result) - 1;$i++) {
			for($j = $i + 1;$j < count($jobs_result);$j++) {
				if($jobs_result[$i]['match_point'] < $jobs_result[$j]['match_point']) {
					$temp = $jobs_result[$i];
					$jobs_result[$i] = $jobs_result[$j];
					$jobs_result[$j] = $temp;
				}
			}
		}

		return $jobs_result;
	}

	public function viewjob($id) {
		// get job detail
		echo modules::run('job/view', $id);
	}

	public function savefilter() {
		$user_id = $this->ion_auth->get_user_id();
		if(isset($_REQUEST['filter_id']) && $_REQUEST['filter_id'] > 0) {
			$filter_id = $_REQUEST['filter_id'];
			$data['user_id'] = $user_id;
			$data['filter_data'] = json_encode($_REQUEST);
			$this->mfilter->update($filter_id, $data);
		} else {
			$data['user_id'] = $user_id;
			$data['filter_data'] = json_encode($_REQUEST);
			$filter_id = $this->mfilter->create($data);
		}

		echo $filter_id;
	}

	public function savejobs() {
		$a_jobs = explode(';', $_REQUEST['selected_jobs']);
		$profile_id = $_REQUEST['profile_id'];
		$this->mfilter->link_profile_jobs($profile_id, $a_jobs);
	}
}