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
class AdminDashboard_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function login()
	{
		$this->db->select('a.isActive,a.id_admin_group, a.id_admin, a.firstname, a.lastname, a.occupation, a.image');
		$this->db->from('admin a');
		$this->db->join('admin_group ag', 'a.id_admin_group = ag.id_admin_group', 'left');
		$this->db->where('username', $this->input->post('_username'));
		$this->db->where('password', md5($this->input->post('_password')));
		$query = $this->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		else {
			$this->adminLog($query->row_array());
		}
		return $query->row_array();
	}
	function adminLog($admin)
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('name', $name);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$data['id_admin'] = $admin['id_admin'];
			$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$data['name'] = $admin['firstname'] . ' ' . $admin['lastname'];
			if ($this->db->insert('admin_log', $data)) return true;
		}
		return false;
	}
	function _getContacts()
	{
		$this->db->order_by('date_add', 'desc');
		$query = $this->db->get('contact_us', $where);
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
}
?>