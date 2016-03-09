<?php
class Ask extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mask"));

       	// layout template
		if (!$this->ion_auth->logged_in())
		{
	        // redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			$this->template->write_view("header", "header");
        	$this->template->write_view("footer", "footer");
		}
		else
		{
			// admin user
			$this->template->write_view("header", "admin/header");
        	$this->template->write_view("footer", "admin/footer");
        }
	}

	public function index() {
		// data
		$data['list_cats'] = $this->mask->list_cats();
		$data['list_asks'] = $this->mask->list_asks();

		// view
		$this->template->write("title", "Quản lý các ASK");
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
}