<?php
class Askcat extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array('url','language'));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array('maskcat'));
        $this->lang->load('askcat');
	}

	public function index() {
		// build view data
		$data['list_cats'] = $this->maskcat->list_cats();

		// view
		$this->template->write('title', $this->lang->line("lbl_manage_askcats"));
        $this->template->write_view('content', 'askcat', $data);
        $this->template->render();
	}

	public function create() {
		$data['ask_cat_name'] = $this->input->post('ask_cat_name');
		$data['description'] = $this->input->post('description');
		$data['ask_cat_name_en'] = $this->input->post('ask_cat_name_en');
		$data['description_en'] = $this->input->post('description_en');
		$data['ask_cat_parent'] = $this->input->post('ask_cat_parent');
		$this->maskcat->create($data);
		redirect('askcat', 'refresh');
	}

	public function edit($id) {
		if(!$id || empty($id))
		{
			redirect('askcat', 'refresh');
		}

		// save
		if (isset($_POST) && !empty($_POST)) {
			$data['ask_cat_name'] = $this->input->post('ask_cat_name');
			$data['description'] = $this->input->post('description');
			$data['ask_cat_name_en'] = $this->input->post('ask_cat_name_en');
			$data['description_en'] = $this->input->post('description_en');
			$data['ask_cat_parent'] = $this->input->post('ask_cat_parent');
			$this->maskcat->update($id, $data);
			redirect('askcat','refresh');
		}

		// data
		$data['askcat'] = $this->maskcat->read($id);
		$data['list_cats'] = $this->maskcat->list_cats();
		$data['message'] = '';

		// view
		$this->template->write("title", $this->lang->line("lbl_edit_askcat"));
        $this->template->write_view("content", "edit_askcat", $data);
        $this->template->render();
	}

	public function delete($id) {
		if(!$id || empty($id))
		{
			redirect('askcat', 'refresh');
		}

		$this->maskcat->delete($id);
		redirect('askcat','refresh');
	}
}