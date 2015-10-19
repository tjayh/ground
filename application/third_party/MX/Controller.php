<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load MX core classes */
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
 * @copyright	Copyright (c) Wiredesignz 2010-11-12
 * @version 	5.3.5
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
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->_init();	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
	}
	
	public function __get($class) {
		return CI::$APP->$class;
	}
	public function _remap($method) {
		if (in_array(strtolower($method), array_map('strtolower', get_class_methods($this)))) {
			$uri = $this->uri->segment_array();
			unset($uri[1]);
			unset($uri[2]);

			call_user_func_array(array($this, $method), $uri);
		}
		else {
			//current_url();
			$this->session->set_userdata('errorUrl',$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
			$uri = $this->uri->segment_array();
			if($uri[1] == _ADMIN_BASE_)
				redirect(base_url()._ADMIN_BASE_.'/error');
			else
				redirect(base_url().'error');
		}
	}
}