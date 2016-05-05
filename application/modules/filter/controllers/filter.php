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
		$data['list_jobs'] = $this->mfilter->list_jobs($this->ion_auth->get_user_id());
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
}