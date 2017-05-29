<?php
class Home extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array("url"));
		$this->load->model(array("mhome"));
	}

	public function index() {
		// count records
		$count_array = $this->mhome->count_records('asks');
		$data['count_asks'] = number_format($count_array['count_records'], 0);
		$count_array = $this->mhome->count_records('profiles');
		$data['count_profiles'] = number_format($count_array['count_records'], 0);
		$count_array = $this->mhome->count_records('jobs');
		$data['count_jobs'] = number_format($count_array['count_records'], 0);
		$count_array = $this->mhome->count_records('jobs_new');
		$data['count_jobs_new'] = number_format($count_array['count_records'], 0);

		// view
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
		$this->template->write_view("content", "home", $data);
		$this->template->render();
	}
}