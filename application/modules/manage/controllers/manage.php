<?php
class Manage extends MX_Controller{

	public function __construct() {
		parent::__construct();
        $this->load->helper(array("url"));
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model(array("mmanage"));
	}

	public function index() {
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "about_us");
        $this->template->render();
	}

	public function jobs() {
		$data['list_profiles'] = $this->mmanage->list_profiles($this->ion_auth->get_user_id());
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "jobs", $data);
        $this->template->render();
	}

	public function profiles() {
		$data['list_jobs'] = $this->mmanage->list_jobs($this->ion_auth->get_user_id());
		$this->template->write("title", "Pro5Job - Tuyển dụng, Tìm việc, Đào tạo");
        $this->template->write_view("content", "profiles", $data);
        $this->template->render();
	}

	public function getdata() {
		$doaction = $_REQUEST['doaction'];
		if($doaction == 'get_profile_jobs') {
			$profile_id = $_REQUEST['profile_id'];
			$data['list_jobs'] = $this->mmanage->get_profile_jobs($profile_id);
			echo json_encode($data);
		} elseif($doaction == 'get_jobs_profile') {
			$profile_id = $_REQUEST['profile_id'];
			$data['list_jobs'] = $this->mmanage->get_jobs_profile($profile_id);
			echo json_encode($data);
		} elseif($doaction == 'get_job_profiles') {
			$job_id = $_REQUEST['job_id'];
			$data['list_profiles'] = $this->mmanage->get_job_profiles($job_id);
			echo json_encode($data);
		}
	}

	public function export2word($list_jobs) {
		$list_files = array('');
		$list_jobs = explode('_', $list_jobs);

		// export to doc file
		foreach($list_jobs as $job_id) {
			if($job_id != '') {
				$list_files[] = $this->generateJobInfoDoc($job_id);
			}
		}

		$zipname = 'cv.zip';
		$zip = new ZipArchive();
		$zip->open($zipname, ZipArchive::CREATE);
		foreach ($list_files as $filename) {
			if (file_exists($filename)) {
		  		$zip->addFile($filename);
		  	}
		}
		$zip->close();

		// Download the file:
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment;filename='.$zipname);
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($zipname));
	    ob_clean();
	    flush();
	    $status = readfile($zipname);
	    unlink($zipname);
	    exit;
	}

	private function generateJobInfoDoc($job_id) {
		require_once APPPATH."/third_party/PHPWord.php";
		// load templage
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate(APPPATH."/third_party/Template.docx");
		// merge values
		$document->setValue('Value1', 'Sun');
		$document->setValue('Value2', 'Mercury');
		$document->setValue('Value3', 'Venus');
		$document->setValue('Value4', 'Earth');
		$document->setValue('Value5', 'Mars');
		$document->setValue('Value6', 'Jupiter');
		$document->setValue('Value7', 'Saturn');
		$document->setValue('Value8', 'Uranus');
		$document->setValue('Value9', 'Neptun');
		$document->setValue('Value10', 'Pluto');
		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));

		// export
		$file_name = 'cv_'.$job_id.'.docx';
		$document->save($file_name);

		return $file_name;
	}

	public function export2emails($list_jobs) {
		require_once APPPATH."/third_party/PHPWord.php";
		// load templage
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate(APPPATH."/third_party/Template.docx");
		// merge values
		$document->setValue('Value1', 'Sun');
		$document->setValue('Value2', 'Mercury');
		$document->setValue('Value3', 'Venus');
		$document->setValue('Value4', 'Earth');
		$document->setValue('Value5', 'Mars');
		$document->setValue('Value6', 'Jupiter');
		$document->setValue('Value7', 'Saturn');
		$document->setValue('Value8', 'Uranus');
		$document->setValue('Value9', 'Neptun');
		$document->setValue('Value10', 'Pluto');
		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));

		// export
		$file_name = 'emails.docx';
		$document->save($file_name);

		// Download the file:
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment;filename='.$file_name);
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file_name));
	    ob_clean();
	    flush();
	    $status = readfile($file_name);
	    unlink($file_name);
	    exit;
	}
}