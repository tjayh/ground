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
class Newslettermanager extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('newslettermanager_model', 'newsletter');
	}
	function index()
	{
		$subscribers = $this->newsletter->_getSubscribers();
		if ($subscribers) {
			$this->template->assign('subscribers', $subscribers);
		}
	}
	function campaigns()
	{
		$newsletters = $this->newsletter->_getNewsletters();
		if ($newsletters) {
			$this->template->assign('newsletters', $newsletters);
		}
	}
	function settings()
	{
		$this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->model('settings/settings_model', 'settings');
		$fields = array(
			'newsletter_email',
			'newsletter_password',
			'newsletter_smtp_host',
			'newsletter_smtp_port'
		);
		foreach($fields as $value) {
			$item = $this->settings->get(strtoupper($value));
			if (strpos($value, 'password') || strpos($value, 'pass')) {
				$item = $this->encrypt->decode($item);
			}
			$this->template->assign($value, $item);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'upd-settings':
			$result = $this->newsletter->_updateSettings();
			break;

		case 'delete-subscriber':
			$result = $this->newsletter->_deleteSubscriber();
			break;

		case 'add-newsletter':
			$result = $this->newsletter->_addNewsletter();
			break;

		case 'edit-newsletter':
			$result = $this->newsletter->_editNewsletter();
			break;

		case 'delete-newsletter':
			$result = $this->newsletter->_deleteNewsletter();
			break;

		case 'send-newsletter':
			$result = $this->newsletter->_notifySubscriber();
			break;

		case 'upload-cms-image':
			$result = $this->newsletter->_uploadCMSImage();
			break;

		case 'export-subscribers-list':
			$result = $this->newsletter->generate_subscribe_report();
			break;

		default:
			break;
		}
		if ($result) {
			if (count($this->error)) {
				$result['error'] = $this->error;
			}
			echo json_encode($result);
		}
		else {
			echo 'false';
		}
		exit(0);
	}
}
/* End of file Pages.php */
/* Location: application/modules/Pages/Pages.php */
