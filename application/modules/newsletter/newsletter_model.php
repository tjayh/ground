<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");
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
class Newsletter_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	function addNewSubscriber()
	{
		$data = $this->input->post('data');
		if ($data['email'] == '') return false;
		if ($this->getSubscriberByEmail($data['email'])) {
			$subscription['date_add'] = date('Y-m-d H:i:s');
			$subscription['email'] = $data['email'];
			$subscription['status'] = 1;
			$this->db->insert('newsletter_subscribers', $subscription);
			$id = $this->db->insert_id();
			$code = array(
				'code' => $this->encrypt->encode($id)
			);
			$this->db->where('id_subscriber', $id);
			$this->db->update('newsletter_subscribers', $code);
			return true;
		}
		else {
			return false;
		}
	}
	function getSubscriberByEmail($email)
	{
		$this->db->select('email, status');
		$this->db->from('newsletter_subscribers');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else {
			return true;
		}
	}
}
?>