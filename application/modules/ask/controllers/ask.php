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
	        $this->template->write_view("header", "header");
	        $this->template->write_view("footer", "footer");
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
		$this->template->write("title", "Quản lý các ASK");
        $this->template->write_view("content", "ask");
        $this->template->render();
	}

	public function create_ask() {
		$ask_data['ask_name'] = $this->input->post('ask_name');
		$ask_data['ask_description'] = $this->input->post('ask_description');
		$this->mask->create_ask($ask_data);
	}
}