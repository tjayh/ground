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
class Config_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	function login()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $this->input->post('_username'));
		$this->db->where('password', md5($this->input->post('_password')));
		$query = $this->db->get();
		if (!$query->num_rows()) return false;
		return $query->row_array();
	}
	function get($name)
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('name', $name);
		$query = $this->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		$row = $query->row_array();
		return $row['value'];
	}
	function set($name, $value)
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('name', $name);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$data['name'] = $name;
			$data['value'] = $value;
			$data['date_add'] = date('Y-m-d H:i:s');
			$data['date_upd'] = $data['date_add'];
			if ($this->db->insert('config', $data)) return true;
		}
		else {
			if ($this->update($name, $value)) return true;
		}
		return false;
	}
	function update($name, $value)
	{
		$data['value'] = $value;
		$data['date_upd'] = date('Y-m-d H:i:s');
		$where['name'] = $name;
		if ($this->db->update('config', $data, $where)) return true;
	}
	function setServerSettings()
	{
		$vars = urldecode($this->input->post('fields'));
		parse_str($vars, $vars);
		$this->setFieldsSettings($vars);
	}
	function setFieldsSettings($vars)
	{
		foreach($vars as $key => $value) {
			if (strpos($key, 'password') || strpos($key, 'pass')) {
				$value = $this->encrypt->encode($value);
			}
			$this->set(strtoupper($key) , $value);
		}
	}
	function getDecoded($name)
	{
		$encodedString = $this->get($name);
		return $this->encrypt->decode($encodedString);
	}
}
?>