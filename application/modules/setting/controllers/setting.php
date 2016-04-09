<?php
class Setting extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("msetting"));
	}

	public function index() {
		// data
		$data['locations'] = $this->msetting->list_all('location');
		$data['experiences'] = $this->msetting->list_all('experience');
		$data['graduations'] = $this->msetting->list_all('graduation');
		$data['salaries'] = $this->msetting->list_all('salary');

		// view
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "setting", $data);
        $this->template->render();
	}

	public function create() {
		$data['type'] = $this->input->post('sub_value');
		$data['name'] = $this->input->post($data['type'].'_name');
		$data['code'] = str_replace(' ', '-', strtolower($data['name']));
		if($data['name'] != '') {
			$this->msetting->create($data);
		}

		redirect('setting', 'refresh');
	}

	public function edit($id) {
		$data = $this->msetting->read($id);
		echo $data['name'];
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