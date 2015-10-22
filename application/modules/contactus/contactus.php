<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**49.144.15.14
* Vii Framework
*
* @package			ViiFramework (libraries from CodeIgniter)
* @author			ViiWorks Production Team
* @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.
* @website url 	http://www.viiworks.com/
* @filesource
*
*/
class Contactus extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contactus_model', 'contactus');
		$this->load->model('core/config_model', 'config_model');
		$this->load->helper('recaptcha');
	}
	function index()
	{
		$this->template->assign('RECAPTCHA_PUBLIC_KEY', $this->config_model->get('RECAPTCHA_PUBLIC_KEY'));
		$this->template->assign('RECAPTCHA_PRIVATE_KEY', $this->config_model->get('RECAPTCHA_PRIVATE_KEY'));
	}
	function process()
	{
		$action = $this->uri->segment(3);
		switch ($action) {
		case 'add-contact':
			$result = $this->contactus->addContact();
			break;

		default:
			break;
		}
		if ($result) echo json_encode($result);
		else echo 'false';
		exit(0);
	}
	function verify_captcha()
	{
		$publickey = $this->config_model->get('RECAPTCHA_PUBLIC_KEY');
		$privatekey = $this->config_model->get('RECAPTCHA_PRIVATE_KEY');
		$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		if ($resp->is_valid) {
			echo 'true';
		}
		else {
			echo 'false';
			exit(0);
		}
	}
}
/* End of file Pages.php */
/* Location: application/modules/Pages/Pages.php */
?>