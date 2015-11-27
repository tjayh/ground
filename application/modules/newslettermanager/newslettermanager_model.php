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
class Newslettermanager_model extends CI_Model

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
	}
	function _getSubscribers($isActive = false)
	{
		if ($isActive) {
			$this->db->where('status', 1);
		}
		$query = $this->db->get('newsletter_subscribers');
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getNewsletters($id_newsletter = false)
	{
		$this->db->select('*');
		$this->db->from('newsletter');
		$this->db->order_by('date_add', 'desc');
		if ($id_newsletter) {
			$this->db->where('id_newsletter', $id_newsletter);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			if ($id_newsletter) {
				return $result;
			}
			else {
				$return = array();
				foreach($result as $item) {
					$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
					$return[] = $item;
				}
				return $return;
			}
		}
		return false;
	}
	function getLastNewsletter()
	{
		$this->db->select('*');
		$this->db->from('newsletter');
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->last_row('array');
		}
		else {
			return false;
		}
	}
	function getActiveSubscribers()
	{
		$where['status'] = 1;
		$query = $this->db->get('newsletter_subscribers', $where);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		}
		return false;
	}
	function _sendNewsletter($title = false, $content = false)
	{
		if ($content == null) {
			$this->error[] = "Content can't be null.";
			return false;
		}
		else {
			$result = $this->getActiveSubscribers();
			if ($result) { //subscribers list not empty
				$this->load->library('email');
				$this->load->library('encrypt');
				$this->load->model('settings/settings_model', 'settings');
				$newsletterEmail = $this->settings->get('ADMIN_EMAIL');
				$siteName = $this->settings->get('SITE_NAME');
				$config = Array(
					'protocol' => "mail",
					'charset' => "utf-8",
					'mailtype' => "html",
					'newline' => "\r\n",
					'newline' => "\r\n"
				);
				$flag = true;
				foreach($result as $item) {
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from($newsletterEmail, $siteName);
					$this->email->to($item['email']);
					$this->email->subject($title);
					$encrypted_string = $this->encrypt->encode($item['id_subscriber']);
					$this->email->message($content . '<br/><br/>' . $unsubscribe);
					if (!$this->email->send()) {
						$this->error[] = $this->email->print_debugger();
						$flag = false;
					}
				}
				if ($flag) return true;
				else return false;
			}
		}
	}
	function _sendNewsletter2($title = false, $content = false)
	{
		if ($content == null) {
			$this->error[] = "Content can't be null.";
			return false;
		}
		else {
			$result = $this->getActiveSubscribers();
			if ($result) { //subscribers list not empty
				$this->load->library('encrypt');
				$this->load->model('settings/settings_model', 'settings');
				$newsletterEmail = $this->settings->get('NEWSLETTER_EMAIL');
				$newsletterPass = $this->settings->get('NEWSLETTER_PASSWORD');
				$smtpHost = $this->settings->get('NEWSLETTER_SMTP_HOST');
				$smtpPort = $this->settings->get('NEWSLETTER_SMTP_PORT');
				$siteName = $this->settings->get('SITE_NAME');
				$newsletterPass = $this->encrypt->decode($newsletterPass);
				$config = Array(
					'protocol' => "smtp",
					'smtp_host' => $smtpHost,
					'smtp_port' => $smtpPort,
					'smtp_user' => $newsletterEmail,
					'smtp_pass' => $newsletterPass,
					'charset' => "utf-8",
					'mailtype' => "html",
					'newline' => "\r\n",
					'newline' => "\r\n"
				);
				$this->load->library('email', $config);
				$flag = true;
				foreach($result as $item) {
					$this->email->set_newline("\r\n");
					$this->email->from($newsletterEmail, $siteName);
					$this->email->to($item['email']);
					$this->email->subject($title);
					$encrypted_string = $this->encrypt->encode($item['id_subscriber']);
					// $unsubscribe = "<a href = '".BASE_URL."unsubscribe/".$encrypted_string."'>Unsubscribe</a>";
					$this->email->message($content . '<br/><br/>' . $unsubscribe);
					if (!$this->email->send()) {
						$this->error[] = $this->email->print_debugger();
						$flag = false;
					}
				}
				if ($flag) return true;
				else return false;
			}
		}
	}
	function _notifySubscriber()
	{
		$data = $this->input->post('data');
		$result = $this->getActiveSubscribers();
		$newsletters = $this->_getNewsletters($data['id_newsletter']);
		$content = file_get_contents(base_url() . "/skin/aceadmin/includes/newsletters/" . $data['id_newsletter'] . ".txt", FILE_USE_INCLUDE_PATH);
		foreach($result as $item) {
			$to = $item['email'];
			$this->load->model('settings/settings_model', 'settings');
			$replyTo = $this->settings->get('NEWSLETTER_EMAIL');
			$fromName = $this->settings->get('SITE_NAME');
			$subject = $newsletters[0]['title'];
			$this->load->model('core/email_model', 'email_model');
			$this->email_model->sendEmail($to, $subject, $content, false, false, $data, $replyTo, $fromName);
			// (to,  subject,  message,  attachment, template, data, replyTo, fromName)
		}
		return true;
	}
	function _editNewsletter()
	{
		$errorList = array();
		$data = $this->input->post('data');
		if ($data) {
			$title = $data['clmn_title'];
			$content = $data['clmn_content'];
			unset($data['clmn_content']);
			$params['table'] = 'newsletter';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->update($params)) {
				$dbr = fopen(_SKIN_PATH_ . _ADMIN_THEME_ . '/includes/newsletters/' . $data['whr_id_newsletter'] . '.txt', 'w');
				fwrite($dbr, $content);
				fclose($dbr);
			}
			else {
				$this->error[] = 'Failed to update newsletter table.';
			}
		}
		else {
			$this->error[] = 'No post data.';
		}
		if (count($this->error)) {
			$result = array();
			$result['error'] = $this->error;
			return $result;
		}
		else return true;
	}
	function _addNewsletter()
	{
		$data = $this->input->post('data');
		$errorList = array();
		if ($data) {
			$title = $data['clmn_title'];
			$content = $data['content'];
			unset($data['content']);
			$data['clmn_date_add'] = date('Y-m-d H:i:s');
			$params['table'] = 'newsletter';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->add($params);
			if ($result) {
				$lastRow = $this->getLastNewsletter();
				$data = null;
				$data['whr_id_newsletter'] = $lastRow['id_newsletter'];
				$data['clmn_content'] = $lastRow['id_newsletter'] . '.txt';
				$params['table'] = 'newsletter';
				$params['post_data'] = $data;
				if ($this->dbtm->update($params)) {
					$dbr = fopen(_SKIN_PATH_ . _ADMIN_THEME_ . '/includes/newsletters/' . $lastRow['id_newsletter'] . '.txt', 'w');
					fwrite($dbr, $content);
					fclose($dbr);
					/* if ($this->_sendNewsletter($title, $content)) {
					return true;
					}
					else {
					$this->error[] = 'Failed to send newsletters.';
					} */
				}
				else {
					$this->error[] = 'Database Error: Failed to update filename at content column.';
				}
			}
			else return false;
		}
		else {
			$this->error[] = 'No post data.';
		}
		if (count($this->error)) {
			$result = array();
			$result['error'] = $this->error;
			return $result;
		}
		else return true;
	}
	function _deleteSubscriber()
	{
		$deleteid = $this->input->post('id_subscriber');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_subscriber', $deleteid, 'newsletter_subscribers');
			if ($result) {
				$result = true;
			}
			else $this->error[] = "Failed to delete subscriber.";
		}
		else {
			return false;
		}
	}
	function _deleteNewsletter()
	{
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
		else {
			return false;
		}
	}
	function _updateSettings()
	{
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
		}
		else {
			return false;
		}
	}
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
	function generate_subscribe_report()
	{
		/* $date_range = str_replace("%20", " ", $this->uri->segment(4)); */
		$this->load->model('core/excel_model', 'excel');
		$this->load->model('settings/settings_model', 'settings');
		$data['site_name'] = $this->settings->get('SITE_NAME');
		$data['list'] = $this->_getSubscribers(1);
		$this->excel->subscriber_lists_report($data);
	}
}
/* End of file pages_model.php */
/* Location: ./application/modules/Pages/Pages_model.php */
