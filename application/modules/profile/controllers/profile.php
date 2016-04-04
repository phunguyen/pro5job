<?php
class Profile extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mprofile"));
	}

	public function index() {
		$data['ask_cats'] = $this->mprofile->get_ask_cats();
		$data['list_asks'] = $this->mprofile->get_asks();
		$data['list_profiles'] = $this->mprofile->list_profiles($this->ion_auth->get_user_id());
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "profile", $data);
        $this->template->render();
	}

	public function create() {
		$data['profile_name'] = $this->input->post('profile_name');
		$data['profile_contact'] = $this->input->post('profile_contact');
		$data['user_id'] = $this->ion_auth->get_user_id();
		if($data['profile_name'] != '') {
			$this->mprofile->create($data);
		}
		redirect('profile', 'refresh');
	}

	public function edit($id) {
		if(!$id || empty($id))
		{
			redirect('profile', 'refresh');
		}

		// save
		if (isset($_POST) && !empty($_POST)) {
			// save profile
			$data['profile_name'] = $this->input->post('profile_name');
			$data['profile_contact'] = $this->input->post('profile_contact');
			$data['user_id'] = $this->ion_auth->get_user_id();
			$data['subdata'] = json_encode($_POST);
			// echo '<pre>';print_r($data);exit;
			$this->mprofile->update($id, $data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$selected_asks_require = $this->input->post('selected_asks_require');
			$selected_asks_require = explode(';', $selected_asks_require);
			$selected_asks_rating = $this->input->post('selected_asks_rating');
			$selected_asks_rating = explode(';', $selected_asks_rating);
			$this->mprofile->link_profile_ask($id, $selected_asks, $selected_asks_require, $selected_asks_rating);

			// redirect
			redirect('profile', 'refresh');
		}

		// data
		$data['ask_cats'] = $this->mprofile->get_ask_cats();
		$data['list_asks'] = $this->mprofile->get_asks();
		$data['list_profiles'] = $this->mprofile->list_profiles($this->ion_auth->get_user_id());
		$data['profile_data'] = $this->mprofile->read($id);
		$data['linked_asks'] = $this->mprofile->get_linked_asks($id);
		$data['sub_data'] = json_decode($data['profile_data']['subdata'], true);

		// view
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "profile", $data);
        $this->template->render();
	}

	public function delete($id) {
		if(!$id || empty($id))
		{
			redirect('profile', 'refresh');
		}

		$this->mprofile->delete($id);
		redirect('profile','refresh');
	}

	public function add_ask() {
		// echo '<pre>';print_r($_REQUEST);echo '</pre>';
		echo Modules::run('ask/add_ask', $_REQUEST);
	}
}