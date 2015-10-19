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
class Aux_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	function deleteItem($field, $id, $table)
	{
		$where[$field] = $this->input->post($id);
		if ($this->db->delete($table, $where)) {
			return true;
		}
		else return false;
	}
	function changeStatusItem($field, $id, $table, $statusField, $status)
	{
		$data[$statusField] = $status;
		$where[$field] = $this->input->post($id);
		if ($this->db->update($table, $data, $where)) return true;
		else return false;
	}
	function sortOrder()
	{
		$listItem = $_POST['listItem'];
		$table = $_POST['table'];
		$sort_order = 1;
		foreach($listItem as $id_document) {
			$data['sort_order'] = $sort_order;
			$where['id_' . $table] = $id_document;
			$this->db->update($table, $data, $where);
			$sort_order++;
		}
		echo '<pre>';
		print_r($listItem);
		echo '</pre>';
	}
}
?>