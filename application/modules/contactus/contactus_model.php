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
class Contactus_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('core/email_model', 'email_model');
		$this->load->model('core/config_model', 'config_model');
	}
	function addContact()
	{
		$data = $this->input->post('data');
		$data['date_add'] = date('Y-m-d H:i:s');
		if ($this->db->insert('contact_us', $data)) {
			$this->notifyStaff($data);
			if ($data['email']) {
				$this->notifySender($data);
				return true;
			}
		}
		else {
			return false;
		}
	}
	function notifyStaff($data)
	{
		$to = $this->config_model->get('CONTACT_EMAIL');
		$cc = $this->config_model->get('CONTACT_EMAIL_CC');
		$replyTo = $data['email'];
		$fromName = $data['name'];
		if ($data['subject']) {
			$data['subject'] = '[' . $data['subject'] . ']';
		}
		$subject = $this->config_model->get('SITE_NAME') . ' :: New Contact Us Message ' . $data['subject'];
		$this->email_model->sendEmail($to, $subject, 'Message', false, 'contact-us-admin.html', $data, $replyTo, $fromName, $cc);
		// (to, subject, message, attachment, template, data, replyTo, fromName)
	}
	function notifySender($data)
	{
		$to = $data['email'];
		$replyTo = $this->config_model->get('CONTACT_EMAIL');
		$fromName = $this->config_model->get('SITE_NAME');
		$subject = $this->config_model->get('SITE_NAME') . ' :: Thank you for contacting us';
		$this->email_model->sendEmail($to, $subject, 'Message', false, 'contact-us-sender.html', $data, $replyTo, $fromName, false);
	}
}
/* End of file pages_model.php */
/* Location: ./application/modules/Pages/Pages_model.php */
?>