<?php
class Askcat extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array('url','language'));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array('maskcat'));
        $this->lang->load('askcat');

       	// layout template
		if (!$this->ion_auth->logged_in())
		{
	        $this->template->write_view('header', 'header');
	        $this->template->write_view('footer', 'footer');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			$this->template->write_view('header', 'header');
        	$this->template->write_view('footer', 'footer');
		}
		else
		{
			// admin user
			$this->template->write_view('header', 'admin/header');
        	$this->template->write_view('footer', 'admin/footer');
        }
	}

	public function index() {
		// build view data
		$data['list_cats'] = $this->maskcat->listall();

		// view
		$this->template->write('title', 'Quản lý các danh mục ASK');
        $this->template->write_view('content', 'askcat', $data);
        $this->template->render();
	}

	public function create() {
		$data['ask_cat_name'] = $this->input->post('ask_cat_name');
		$data['description'] = $this->input->post('description');
		$data['ask_cat_parent'] = $this->input->post('ask_cat_parent');
		$this->maskcat->create($data);
	}
}