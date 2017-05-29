<?php
class Report extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array("url"));
		$this->load->model(array("mreport"));
	}

	public function index() {
		$data['ask_cats'] = $this->mreport->get_ask_cats();
		$data['list_asks'] = $this->mreport->list_asks();

		// view
		$this->template->write("title", "Thống Kê");
		$this->template->write_view("content", "report", $data);
		$this->template->render();
	}
}