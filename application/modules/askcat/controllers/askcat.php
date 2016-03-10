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
		$data['list_cats'] = $this->maskcat->listcats();

		// view
		$this->template->write('title', 'Quản lý các danh mục ASK');
        $this->template->write_view('content', 'askcat', $data);
        $this->template->render();
	}

	public function create() {
		$data['ask_cat_name'] = $this->input->post('ask_cat_name');
		$data['description'] = $this->input->post('description');
		$data['ask_cat_parent'] = $this->input->post('ask_cat_parent');echo '<pre>';print_r($data);echo '</pre>';
		$this->maskcat->create($data);
		redirect('askcat', 'refresh');
	}
}