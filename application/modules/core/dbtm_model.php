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
class Dbtm_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function deleteItem($field, $id, $table)
	{
		$where[$field] = $id;
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
	function update($params)
	{
		$params = $this->buildParams($params);
		if ($params['table'] == '' || $params['where_identifier'] == '') return false;
		$postdata = $params['post_data'];
		$data = $this->buildData($params, $postdata);
		$where = $this->buildWhere($params, $postdata);
		if (!$data || !$where) return false;
		if ($params['includeDates']) {
			if (!$postdata['date_upd']) {
				$data['date_upd'] = date('Y-m-d H:i:s');
			}
		}
		// $data=$this->processData($data);
		if ($this->db->update($params['table'], $data, $where)) {
			// echo $this->db->last_query();
			return 1;
		}
		else {
			return false;
		}
	}
	function add($params)
	{
		$params = $this->buildParams($params);
		if ($params['table'] == '' || $params['data_identifier'] == '') return false;
		$postdata = $params['post_data'];
		$data = $this->buildData($params, $postdata);
		if (!$data) return false;
		if ($params['includeDates']) {
			if (!$postdata['date_add']) {
				$data['date_add'] = date('Y-m-d H:i:s');
			}
			if (!$postdata['date_upd']) {
				$data['date_upd'] = date('Y-m-d H:i:s');
			}
		}
		// $data=$this->processData($data);
		if ($this->db->insert($params['table'], $data)) {
			// echo $this->db->last_query();
			return 1;
		}
		else {
			return false;
		}
	}
	function processData2($dataItem, $action)
	{ //sheena
		switch ($action) {
		case 'password':
			return md5($dataItem);
			break;

		case 'encrypt-pass':
			$this->load->helper('string');
			$this->load->library('encrypt');
			return $this->encrypt->encode($dataItem);
			break;

		default:
			break;
		}
	}
	function processData($data)
	{
		$encrypt = array(
			'md5_',
			'password',
			'crypt_'
		);
		$soefriendly = array(
			'seofriendly_',
			'regex_',
			'simple_',
			'seoformat_',
			'sformat_'
		);
		$result = array();
		foreach($data as $key => $item) {
			$result[$key] = $item;
			foreach($encrypt as $string) {
				if (strpos($string, $key) !== false) {
					$item = md5($item);
					$result[$key] = $item;
					break;
				}
			}
			foreach($soefriendly as $string) {
				if (strpos($string, $key) !== false) {
					$item = preg_replace("/[^a-zA-Z0-9]+/", "", $item);
					$item = strtolower($item);
					$result[$key] = $item;
					break;
				}
			}
		}
	}
	function buildData($params, $data)
	{
		$result = array();
		if ($params['data_identifier'] != '') {
			foreach($data as $key => $item) {
				if (stristr($key, $params['data_identifier'])) {
					if (is_array($item)) {
						$item = implode('||', $item);
					}
					$result[str_ireplace($params['data_identifier'], '', $key) ] = $item;
				}
			}
		}
		if ($result) {
			return $result;
		}
		else return $data;
	}
	function buildWhere($params, $data)
	{
		$result = array();
		if ($params['where_identifier'] != '') {
			foreach($data as $key => $item) {
				if (stristr($key, $params['where_identifier']) && $item != '') {
					$result[str_ireplace($params['where_identifier'], '', $key) ] = $item;
				}
			}
		}
		return $result;
	}
	function buildParams($params)
	{
		if ($params['where_identifier'] == '') {
			$params['where_identifier'] = _WHERE_IDENTIFIER_;
		}
		if ($params['data_identifier'] == '') {
			$params['data_identifier'] = _COLUMN_IDENTIFIER_;
		}
		if ($params['post_data'] == '') {
			$params['post_data'] = 'data';
		}
		return $params;
	}
}
?>