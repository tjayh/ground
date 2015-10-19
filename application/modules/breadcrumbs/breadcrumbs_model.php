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
class Breadcrumbs_model extends CI_Model

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
	}
	function getBc()
	{
		$this->db->select('id_bc,name');
		$this->db->from('bc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
	function getBcTree($bc_name = 'admin', $id)
	{
		$this->db->flush_cache();
		$this->db->order_by('name', 'ASC');
		$parent = $this->db->get_where('bc_' . $bc_name, array(
			'parent_id' => $id
		));
		if ($parent->num_rows() == 0) return NULL;
		$return = array();
		foreach($parent->result_array() as $row) {
			$child = $this->getBcTree($bc_name, $row['id_bc_' . $bc_name]);
			$row['json'] = htmlentities(json_encode($row) , ENT_QUOTES);
			if ($child) $row['children'] = $child;
			$return[] = $row;
		}
		return $return;
	}
	function getBcList($bc_name = 'admin')
	{
		$this->db->select('*');
		$this->db->from('bc_' . $bc_name);
		$this->db->order_by("parent_id", "asc");
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
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
	function _deleteBc()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			foreach($data as $key => $value) {
				if (stristr($key, 'id_bc_')) {
					$table = str_ireplace('id_bc_', '', $key);
					$result = $this->dbtm->deleteItem($key, $value, 'bc_' . $table);
					if ($result) return true;
					else {
						$result['error'] = 'Failed to delete breadcrumb.';
						return $result;
					}
					break;
				}
			}
			$result['error'] = 'Wrong move';
			return $result;
		}
		else { //direct link access
			return false;
		}
	}
	function _addBc()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$table = 'bc_' . $data['bc_name'];
			unset($data['bc_name']);
			$params['table'] = $table;
			$params['post_data'] = $data;
			if ($this->dbtm->add($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to insert breadcrumb item at " . $table . " table.";
				return $result;
			}
		}
		else { //direct link access
			return false;
		}
	}
	function _editBc()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$table = 'bc_' . $data['bc_name'];
			unset($data['bc_name']);
			$params['table'] = $table;
			$params['post_data'] = $data;
			if ($this->dbtm->update($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update breadcrumb item at " . $table . " table.";
				return $result;
			}
		}
		else { //direct link access
			return false;
		}
	}
}
?>