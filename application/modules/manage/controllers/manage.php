<?php
class Manage extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mmanage"));
	}

	public function index() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "about_us");
        $this->template->render();
	}

	public function jobs() {
		$data['list_profiles'] = $this->mmanage->list_profiles($this->ion_auth->get_user_id());
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "jobs", $data);
        $this->template->render();
	}

	public function profiles() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "profiles");
        $this->template->render();
	}

	public function getdata() {
		$doaction = $_REQUEST['doaction'];
		if($doaction == 'get_profile_jobs') {
			$profile_id = $_REQUEST['profile_id'];
			$data['list_jobs'] = $this->mmanage->get_profile_jobs($profile_id);
			echo json_encode($data);
		}
	}
}