<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Vii Framework
 *
 * @package			ViiFramework (libraries from CodeIgniter)
 * @author			ViiWorks Production Team
 * @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.
 * @website url 	http://www.viiworks.com/
 * @filesource
 *
 */
class AdminDashboard extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model('admindashboard_model', 'dashboard');
	}
	/*function enc(){
	$this->load->library('encrypt');
	echo $this->encrypt->encode(4);
	}*/
	function index()
	{
		$contacts = $this->dashboard->_getContacts();
		if ($contacts) {
			$this->template->assign('contacts', $contacts);
		}
		$subscribers = $this->dashboard->_getSubscribers();
		if ($subscribers) {
			$this->template->assign('subscribers', $subscribers);
		}
	}
	function error()
	{
		$this->template->assign('errorURL', $this->session->userdata('errorUrl'));
		$this->session->unset_userdata('errorUrl');
	}
	function refreshRoutes()
	{
		$this->load->model('cms/cms_model', 'cms');
		$this->cms->refreshRoutes();
		redirect(base_url() . 'administrator');
	}
	function seeSessionData()
	{
		echo "<pre>";
		print_r($this->session->all_userdata());
		echo "</pre>";
	}
	/**
	 * Administrator Login
	 *
	 * @access	public
	 * @return	void
	 */
	function login()
	{
		if ($this->input->post('_username') && $this->input->post('_password')) {
			$admin = $this->dashboard->_login();
			if ($admin) {
				$this->loginAttemps();
				$this->loginAttempsSession();
				if ($admin['isActive']) {
					$this->session->set_userdata('adminLogged', true);
					$this->session->set_userdata('adminData', $admin);
				}
				else {
					$this->session->set_userdata('adminData', $admin);
					$this->error[] = 'User inactive';
					$result['error'] = $this->error;
					echo json_encode($result);
					exit(0);
				}
			}
			else {
				$this->loginAttemps();
				$this->loginAttempsSession();
				$this->error[] = 'Authentication failed.';
				$result['error'] = $this->error;
				echo json_encode($result);
				exit(0);
			}
			if (count($this->error)) {
				$result['error'] = $this->error;
				echo json_encode($result);
				exit(0);
			}
			else {
				if ($this->input->post('redirect')) {
					$redirect_link = $this->input->post('redirect');
				}
				$result['redirect'] = $redirect_link;
				$this->session->unset_userdata('login_session');
				setcookie('login', 0, time() + 60 * 5);
				echo json_encode($result);
				exit(0);
			}
		}
		else{
			if($this->session->userdata('adminLogged')){
				redirect(base_url() . 'administrator');
			}
		}
	}
	function loginAttemps()
	{
		if (isset($_COOKIE['login'])) {
			if ($_COOKIE['login'] < 5) {
				$attempts = $_COOKIE['login'] + 1;
				setcookie('login', $attempts, time() + 60 * 5);
			}
			else {
				$this->error[] = 'You are banned for 5 minutes. Try again later.';
				$result['error'] = $this->error;
				echo json_encode($result);
				exit(0);
			}
		}
		else {
			setcookie('login', 1, time() + 60 * 5);
		}
	}
	function loginAttempsSession()
	{
		$now = time();
		$current_time = mktime(gmdate("H", $now) , gmdate("i", $now) , gmdate("s", $now) , gmdate("m", $now) , gmdate("d", $now) , gmdate("Y", $now));
		$login_session = $this->session->userdata('login_session');
		if ($login_session['attemp'] > 5) { /* check if attemps exceeds */
			if ($login_session['ban_expire']) { /* check if ban expire exists */
				if ($login_session['ban_expire'] > $current_time) { /* check if ban expire does not overtake the current time */
					$this->error[] = 'You are banned for 5 minutes. Try again later.';
					$result['error'] = $this->error;
					echo json_encode($result);
					exit(0);
				}
				else {
					$array = ['attemp' => '', 'ban_expire' => ''];
					$this->session->set_userdata('login_session', $array);
				}
			}
			else {
				$ban_expire = $current_time + 300;
				$array = ['attemp' => $login_session['attemp'], 'ban_expire' => $ban_expire];
				$this->session->set_userdata('login_session', $array);
			}
		}
		else {
			$attemp = $login_session['attemp'] + 1;
			$array = ['attemp' => $attemp, 'ban_expire' => $login_session['ban_expire']];
			$this->session->set_userdata('login_session', $array);
		}
	}
	function logout()
	{
		$this->load->model('cms/cms_model', 'cms');
		$this->cms->refreshRoutes();
		$this->session->unset_userdata('adminLogged');
		$this->session->unset_userdata('adminData');
		redirect(base_url() . 'administrator/login');
	}
	/**
	 * Administrator Logout
	 *
	 * @access	public
	 * @return	void
	 */
}
/* End of file AdminDashboard.php */
/* Location: ./application/controllers/modules/AdminDashboard/AdminDashboard.php */
