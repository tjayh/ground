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
		if ($subscribers) $this->template->assign('subscribers', $subscribers);
	}
	function archive()
	{
		$newsletters = $this->newsletter->_getNewsletters();
		if ($newsletters) $this->template->assign('newsletters', $newsletters);
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
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$data['newsletter_password'] = $this->dbtm->processData2($data['newsletter_password'], 'encrypt-pass');
				foreach($data as $name => $value) {
					$data2 = array();
					$data2['whr_name'] = $name;
					$data2['clmn_value'] = $value;
					$params['table'] = 'config';
					$params['post_data'] = $data2;
					$result = $this->dbtm->update($params);
					unset($data2);
				}
				// $result = true;
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'delete-subscriber':
			$deleteid = $this->input->post('id_subscriber');
			if ($deleteid) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->deleteItem('id_subscriber', $deleteid, 'newsletter_subscribers');
				if ($result) {
					$result = true;
				}
				else $this->error[] = "Failed to delete subscriber.";
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'add-newsletter':
			if ($this->input->post('data')) {
				$result = $this->newsletter->_addNewsletter();
				if ($result['error']) {
					$this->error = $result['error'];
				}
				else {
					$result = true;
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'edit-newsletter':
			if ($this->input->post('data')) {
				$result = $this->newsletter->_editNewsletter();
				if ($result['error']) {
					$this->error = $result['error'];
				}
				else {
					$result = true;
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'delete-newsletter':
			$deleteid = $this->input->post('id_newsletter');
			if ($deleteid) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->deleteItem('id_newsletter', $deleteid, 'newsletter');
				if ($result) {
					if (file_exists(BASEPATH . 'skin/' . _ADMIN_THEME_ . '/includes/newsletters/' . $deleteid . '.txt')) {
						$this->error[] = BASEPATH . 'skin/' . _ADMIN_THEME_ . '/includes/newsletters/' . $deleteid . '.txt';
					}
					$result = true;
				}
				else $this->error[] = "Failed to delete newsletter.";
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'send-newsletter':
			if ($this->input->post('data')) {
				$result = $this->newsletter->_notifySubscriber();
				if ($result['error']) {
					$this->error = $result['error'];
				}
				else {
					$result = true;
				}
			}
			else {
				header('Location: ' . _BASE_URL_);
			}
			break;

		default:
			break;
		}
		if ($result) {
			if (count($this->error)) $result['error'] = $this->error;
			echo json_encode($result);
		}
		else echo 'false';
		exit(0);
	}
}
/* End of file Pages.php */
/* Location: application/modules/Pages/Pages.php */
