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
		$data['startdates'] = $this->msetting->list_all('startdate');
		$data['durations'] = $this->msetting->list_all('duration');
		$data['genders'] = $this->msetting->list_all('gender');

		// view
		$this->template->write("title", "Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "setting", $data);
        $this->template->render();
	}

	public function create() {
		$data['type'] = $_REQUEST['type'];
		$data['name'] = $_REQUEST['name'];
		$data['code'] = $this->convert_vi_to_en(str_replace(' ', '-', strtolower($data['name'])));
		if($data['name'] != '') {
			$new_id = $this->msetting->create($data);
			echo $new_id;
		}
	}

	public function edit($id) {
		if(isset($_REQUEST['name']) && $_REQUEST['name'] != '') {
			// save
			$data['name'] = $_REQUEST['name'];
			$data['code'] = $this->convert_vi_to_en(str_replace(' ', '-', strtolower($data['name'])));
			$this->msetting->update($_REQUEST['id'], $data);
		} else {
			// get data
			$data = $this->msetting->read($id);
			echo $data['name'];
		}
	}

	public function delete($id) {
		if(!$id || empty($id))
		{
			redirect('setting', 'refresh');
		}

		$this->msetting->delete($id);
	}

	public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }
}