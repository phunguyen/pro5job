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
		$data['locations'] = $this->mprofile->get_sub_values('location');
		$data['experiences'] = $this->mprofile->get_sub_values('experience');
		$data['genders'] = $this->mprofile->get_sub_values('gender');
		$data['graduations'] = $this->mprofile->get_sub_values('graduation');
		$data['salaries'] = $this->mprofile->get_sub_values('salary');
		$this->template->write("title", "Công Việc");
        $this->template->write_view("content", "profile", $data);
        $this->template->render();
	}

	public function create() {
		$data['profile_name'] = $this->input->post('profile_name');
		$data['profile_birthdate'] = $this->input->post('profile_birthdate');
		$data['profile_contact'] = $this->input->post('profile_contact');
		$data['user_id'] = $this->ion_auth->get_user_id();
		$data['location'] = $this->input->post('profilesub_location');
		$data['experience'] = $this->input->post('profilesub_experience');
		$data['profile_gender'] = $this->input->post('profilesub_gender');
		$data['graduation'] = $this->input->post('profilesub_graduation');
		$data['salary'] = $this->input->post('profilesub_salary');
		$data['background'] = $this->input->post('profilesub_background');
		$data['work_experience'] = $this->input->post('profilesub_work_experience');
		$data['other'] = $this->input->post('profilesub_other');
		$data['createdtime'] = date('Y-m-d H:i:s');
		$data['modifiedtime'] = date('Y-m-d H:i:s');
		if($data['profile_name'] != '') {
			$new_id = $this->mprofile->create($data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$selected_asks_rating = $this->input->post('selected_asks_rating');
			$selected_asks_rating = explode(';', $selected_asks_rating);
			$this->mprofile->link_profile_ask($new_id, $selected_asks, $selected_asks_rating);
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
			$data['profile_birthdate'] = $this->input->post('profile_birthdate');
			$data['profile_contact'] = $this->input->post('profile_contact');
			$data['user_id'] = $this->ion_auth->get_user_id();
			$data['location'] = $this->input->post('profilesub_location');
			$data['experience'] = $this->input->post('profilesub_experience');
			$data['profile_gender'] = $this->input->post('profilesub_gender');
			$data['graduation'] = $this->input->post('profilesub_graduation');
			$data['salary'] = $this->input->post('profilesub_salary');
			$data['background'] = $this->input->post('profilesub_background');
			$data['work_experience'] = $this->input->post('profilesub_work_experience');
			$data['other'] = $this->input->post('profilesub_other');
			$data['modifiedtime'] = date('Y-m-d H:i:s');
			// echo '<pre>';print_r($data);exit;
			$this->mprofile->update($id, $data);

			// link ask
			$selected_asks = $this->input->post('selected_asks');
			$selected_asks = explode(';', $selected_asks);
			$selected_asks_rating = $this->input->post('selected_asks_rating');
			$selected_asks_rating = explode(';', $selected_asks_rating);
			$this->mprofile->link_profile_ask($id, $selected_asks, $selected_asks_rating);

			// redirect
			redirect('profile', 'refresh');
		}

		// data
		$data['ask_cats'] = $this->mprofile->get_ask_cats();
		$data['list_asks'] = $this->mprofile->get_asks();
		$data['list_profiles'] = $this->mprofile->list_profiles($this->ion_auth->get_user_id());
		$data['profile_data'] = $this->mprofile->read($id);
		$data['linked_asks'] = $this->mprofile->get_linked_asks($id);
		$data['locations'] = $this->mprofile->get_sub_values('location');
		$data['experiences'] = $this->mprofile->get_sub_values('experience');
		$data['genders'] = $this->mprofile->get_sub_values('gender');
		$data['graduations'] = $this->mprofile->get_sub_values('graduation');
		$data['salaries'] = $this->mprofile->get_sub_values('salary');

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

	public function view($id) {
		if(!$id || empty($id))
		{
			redirect('profile', 'refresh');
		}

		// data
		$data['ask_cats'] = $this->mprofile->get_ask_cats();
		$data['list_asks'] = $this->mprofile->get_asks();
		$data['profile_data'] = $this->mprofile->read($id);
		$data['profile_data']['location'] = $this->mprofile->get_sub_value('location', $data['profile_data']['location']);
		$data['profile_data']['experience'] = $this->mprofile->get_sub_value('experience', $data['profile_data']['experience']);
		$data['profile_data']['profile_gender'] = $this->mprofile->get_sub_value('gender', $data['profile_data']['profile_gender']);
		$data['profile_data']['graduation'] = $this->mprofile->get_sub_value('graduation', $data['profile_data']['graduation']);
		$data['profile_data']['salary'] = $this->mprofile->get_sub_value('salary', $data['profile_data']['salary']);
		$data['linked_asks'] = $this->mprofile->get_linked_asks($id);

		// view
        $this->load->view("view", $data);
        // $this->template->render();
	}
}