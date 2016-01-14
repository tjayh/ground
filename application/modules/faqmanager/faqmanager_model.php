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
		$data = str_replace("<p><br></p>", "", $data);
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
		$data = str_replace("<p><br></p>", "", $data);
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
	function _multipleActionItem()
	{
		$multiple_id = explode(",", $this->input->post('multiple_id'));
		$action_type = $this->input->post('action_type');
		switch ($action_type) {
		case 'delete':
			foreach($multiple_id as $key => $item) {
				$deleteid = $item;
				if ($deleteid) {
					$this->db->flush_cache();
					$this->load->model('core/dbtm_model', 'dbtm');
					$this->db->where('id_faq_item', $deleteid);
					$to_delete = $this->db->get('faq_item');
					$data = $to_delete->row_array();
					if (file_exists($this->upload_dir . $data['image_src'])) {
						if (!unlink($this->upload_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete thumb image to temporary folder.";
						}
					}
					$result = $this->dbtm->deleteItem('id_faq_item', $deleteid, 'faq_item');
					if (!$result) {
						$result = array();
						$result['error'] = array();
						$result['error'][] = "Failed to delete item/s.";
						return $result;
					}
				}
			}
			return true;
			break;

		case 'active':
			foreach($multiple_id as $key => $item) {
				$data['whr_id_evetns_item'] =$item;
				$data['clmn_status'] = 1;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'faq_item';
				$params['post_data'] = $data;
				$result = $this->dbtm->update($params);
				if (!$result) {
					$result = array();
					$result['error'] = array();
					$result['error'][] = "Failed to activate item/s.";
					return $result;
				}
			}
			return true;
			break;

		case 'inactive':
			foreach($multiple_id as $key => $item) {
				$data['whr_id_faq_item'] =$item;
				$data['clmn_status'] = 0;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'faq_item';
				$params['post_data'] = $data;
				$result = $this->dbtm->update($params);
				if (!$result) {
					$result = array();
					$result['error'] = array();
					$result['error'][] = "Failed to deactivate item/s.";
					return $result;
				}
			}
			return true;
			break;

		default:
			$result = array();
			$result['error'] = array();
			$result['error'][] = "Failed to perform action. Please try again.";
			return $result;
			break;
		}
	}
	function _addCategory()
	{
		$data = $this->input->post('data');
		$data = str_replace("<p><br></p>", "", $data);
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
		$data = str_replace("<p><br></p>", "", $data);
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
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
}
?>