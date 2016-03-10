<?php
class Ask extends MX_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mask"));
        $this->lang->load('ask');
	}

	public function index() {
		// data
		$data['list_cats'] = $this->mask->list_cats();
		$data['list_asks'] = $this->mask->list_asks();

		// view
		$this->template->write("title", $this->lang->line("ask_manage_asks"));
        $this->template->write_view("content", "ask", $data);
        $this->template->render();
	}

	public function create() {
		$ask_data['ask_name'] = $this->input->post('ask_name');
		$ask_data['description'] = $this->input->post('ask_description');
		$ask_data['ask_cat_id'] = $this->input->post('cat_parent');
		$this->mask->create($ask_data);
		redirect('ask', 'refresh');
	}

	public function edit($id) {
		if(!$id || empty($id))
		{
			redirect('ask', 'refresh');
		}

		// save
		if (isset($_POST) && !empty($_POST)) {
			$ask_data['ask_name'] = $this->input->post('ask_name');
			$ask_data['description'] = $this->input->post('ask_description');
			$ask_data['ask_cat_id'] = $this->input->post('cat_parent');
			$this->mask->update($id, $ask_data);
			redirect('ask','refresh');
		}

		// data
		$data['ask'] = $this->mask->read($id);
		$data['list_cats'] = $this->mask->list_cats();
		$data['message'] = '';

		// view
		$this->template->write("title", $this->lang->line("ask_manage_asks"));
        $this->template->write_view("content", "edit_ask", $data);
        $this->template->render();
	}

	public function delete($id) {
		if(!$id || empty($id))
		{
			redirect('ask', 'refresh');
		}

		$this->mask->delete($id);
		redirect('ask','refresh');
	}
}