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
class Faqmanager_model extends CI_Model

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
	}
	function _getCategoryList($active = false, $uncategorize = false)
	{
		$this->db->select('*');
		$this->db->from('faq_category');
		if ($active) {
			$this->db->where('status', 1);
		}
		if ($uncategorize) {
			$this->db->where('id_faq_category !=', 1);
		}
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
	function _getAllItems()
	{
		$this->db->select('i.*,c.id_faq_category, c.category_title');
		$this->db->from('faq_item i');
		$this->db->join('faq_category c', 'i.id_faq_category = c.id_faq_category', 'left');
		$this->db->where('c.status', 1);
		$this->db->order_by('c.category_title ASC');
		$this->db->order_by('i.faq_question ASC');
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
	function _addItem()
	{
		$data = $this->input->post('data');
		if ($data) {
			$params['table'] = 'faq_item';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->add($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to add faq item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _editItem()
	{
		$data = $this->input->post('data');
		if ($data) {
			$params['table'] = 'faq_item';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->update($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update faq item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteItem()
	{
		$deleteid = $this->input->post('id_faq_item');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_faq_item', $deleteid, 'faq_item');
			if ($result) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete faq item.";
				return $result;
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
	}
	function _addCategory()
	{
		$data = $this->input->post('data');
		if ($data) {
			$params['table'] = 'faq_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->add($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to add faq item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _editCategory()
	{
		$data = $this->input->post('data');
		if ($data) {
			$params['table'] = 'faq_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->update($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update faq item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteCategory()
	{
		$deleteid = $this->input->post('id_faq_category');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_faq_category', $deleteid, 'faq_category');
			if ($result) {
				$this->db->flush_cache();
				$this->db->select('*');
				$this->db->from('faq_item');
				$this->db->where('id_faq_category', $deleteid);
				$params['table'] = 'faq_item';
				$params['includeDates'] = null;
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					unset($data);
					$data['clmn_id_faq_category'] = 1;
					$result = $query->result_array();
					foreach($result as $item) {
						$data['whr_id_faq_item'] = $item[id_faq_item];
						$params['post_data'] = $data;
						$this->dbtm->update($params);
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete faq category.";
				return $result;
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
	}
	function _changeStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'faq_item';
			$params['post_data'] = $data;
			$result = $this->dbtm->update($params);
			if ($result) {
				return true;
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
	}
	function _uploadImage()
	{
		$allowed = array(
			'jpeg',
			'jpg',
			'png'
		);
		$result = array();
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			if (!in_array(strtolower($extension) , $allowed)) {
				$result['error'] = array();
				$result['error'][] = "Invalid file type. '.jpg' and '.png' are allowed.";
				return $result;
			}
			if ($_FILES['file']['size'] > 1000000) {
				$result['error'] = array();
				$result['error'][] = "File size should not exceed to 50KB.";
				return $result;
			}
			$file_name = crypt(strtotime(date('Y-m-d H:i:s')) , random_string('alnum', 32)) . '.' . $extension;
			if (move_uploaded_file($_FILES['file']['tmp_name'], './upload/images/cms/' . $file_name)) {
				echo '../../upload/images/cms/' . $file_name;
				exit(0);
			}
		}
		echo 'false';
		exit(0);
	}
}
?>