<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller
{
	public $autoload = array();

	public function __construct()
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;

		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);

		/* autoload module items */
		$this->load->_autoloader($this->autoload);

		/* permission */
		$this->check_permmission($class);
	}

	public function __get($class) {
		return CI::$APP->$class;
	}

	public function check_permmission($current_class) {
		// check user permission
		$this->load->library(array('ion_auth'));
		$user_datea['current_user'] = $this->ion_auth->user()->row();
		if (!$this->ion_auth->logged_in() && !in_array($current_class, array('Home', 'Aboutus', 'Report')))
		{
			// redirect to home page
			redirect('auth/login', 'refresh');
		}
		elseif ($this->ion_auth->is_admin())
		{
			// admin user
			$this->template->write_view('header', 'admin/header', $user_datea);
        	$this->template->write_view('footer', 'admin/footer');
		}
		elseif ($this->ion_auth->in_group('editor'))
		{
			// editor user
			$this->template->write_view('header', 'editor/header', $user_datea);
        	$this->template->write_view('footer', 'editor/footer');
		}
		elseif ($this->ion_auth->in_group('job'))
		{
			// job user
			$this->template->write_view('header', 'job/header', $user_datea);
        	$this->template->write_view('footer', 'job/footer');
		}
		elseif ($this->ion_auth->in_group('profile'))
		{
			// profile user
			$this->template->write_view('header', 'profile/header', $user_datea);
        	$this->template->write_view('footer', 'profile/footer');
		}
		else
		{
			$this->template->write_view('header', 'header');
        	$this->template->write_view('footer', 'footer');
        }
	}
}