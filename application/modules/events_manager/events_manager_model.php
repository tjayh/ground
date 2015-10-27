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
class Events_manager_model extends CI_Model

{
	var $image_dir = 'upload/images/events/';
	var $image_thumb_dir = 'upload/images/events/thumb/';
	var $temp_dir = './temp/images/events/';
	var $temp_thumb_dir = './temp/images/events/thumb/';
	var $upload_dir = './upload/images/events/';
	var $upload_thumb_dir = './upload/images/events/thumb/';
	function __construct()
	{
		parent::__construct();
	}
	function _getCategoryHeirarchy($active = 1)
	{
		$this->db->select('*');
		$this->db->from('events_category');
		$this->db->where('id_parent', 0);
		$this->db->where('status', $active);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $k => $item) {
				$this->db->select('*');
				$this->db->from('events_category');
				$this->db->where('id_parent', $item['id_events_category']);
				$this->db->order_by('category_title ASC');
				$parent_query = $this->db->get();
				$parent = $parent_query->result_array();
				if ($parent_query->num_rows > 0) $result[$k]['sub_categories'] = $parent;
				else $result[$k]['sub_categories'] = array(
					$result[$k]
				);
			}
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getCategoryList($has_no_parent = false)
	{
		$this->db->select('gc.*');
		$this->db->from('events_category gc');
		$this->db->where('id_events_category !=', 1);
		if ($has_no_parent) $this->db->where('id_parent', 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $k => $item) {
				$result[$k]['parent_title'] = $item['category_title'];
				$category_title = $item['category_title'];
				if ($item['id_parent'] == 0) {
					continue;
				}
				$this->db->flush_cache();
				$this->db->select('*');
				$this->db->from('events_category');
				$this->db->where('id_events_category', $item['id_parent']);
				$parent_query = $this->db->get();
				if ($parent_query->num_rows() == 0) {
					continue;
				}
				$parent = $parent_query->row_array();
				if ($parent['category_title']) {
					$result[$k]['parent_title'] = $parent['category_title'] . ' ' . $item['category_title'];
				}
				$result[$k]['parent_desc'] = $parent['category_desc'];
			}
			foreach($result as $item) {
				$item['image_src_thumb_link'] = base_url() . $this->image_thumb_dir . $item['image_src'];
				$item['image_src_link'] = base_url() . $this->image_dir . $item['image_src'];
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getItems()
	{
		$this->db->select('i.*, gc.id_events_category, gc.id_parent, gc.category_title as category');
		$this->db->from('events_item i');
		$this->db->join('events_category gc', 'gc.id_events_category = i.id_events_category');
		$this->db->order_by('i.date DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['date'] = date('F d, Y', strtotime($item['date']));
				$item['month'] = date('F', strtotime($item['date']));
				$item['year'] = date('Y', strtotime($item['date']));
				$item['image_link'] = base_url() . 'events/article/' . $item['id_events_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb_link'] = base_url() . $this->image_thumb_dir . $item['image_src'];
					$item['image_src_link'] = base_url() . $this->image_dir . $item['image_src'];
				}
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
			$data['link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['image_title']));
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			$data['date_add'] = date('Y-m-d H:i:s');
			$result = $this->db->insert('events_item', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src'], $this->upload_thumb_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
				}
				return true;
			}
			else {
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
		$where = $this->input->post('where');
		if ($data) {
			$data['link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['image_title']));
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			// delete image
			$this->db->where($where);
			$result = $this->db->update('events_item', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src'], $this->upload_thumb_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteItem()
	{
		$deleteid = $this->input->post('id_events_item');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_events_item', $deleteid);
			$to_delete = $this->db->get('events_item');
			$data = $to_delete->row_array();
			if (file_exists($this->upload_dir . $data['image_src'])) {
				if (!unlink($this->upload_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete thumb image to temporary folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_events_item', $deleteid, 'events_item');
			if ($result) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete item.";
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
		$this->db->select('*');
		$this->db->from('events_category');
		$this->db->where('id_events_category', $data['clmn_id_parent']);
		$parent_query = $this->db->get();
		$parent = $parent_query->row_array();
		$data['clmn_category_root'] = $parent['category_title'] . " - " . $data['clmn_category_title'];
		if ($data) {
			$params['table'] = 'events_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->add($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to add item.";
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
		if ($data['clmn_id_parent'] == 0) {
			$upd_data['status'] = $data['clmn_status'];
			$this->db->where('id_parent', $data['whr_id_events_category']);
			$this->db->update('events_category', $upd_data);
		}
		if ($data) {
			$params['table'] = 'events_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->update($params)) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteCategory()
	{
		$deleteid = $this->input->post('id_events_category'); /* get id to be deleted */
		$this->db->flush_cache();
		$this->db->select('id_parent');
		$this->db->from('events_category');
		$this->db->where('id_events_category', $deleteid);
		$query = $this->db->get();
		$result = $query->row_array();
		$this->load->model('core/dbtm_model', 'dbtm');
		if ($result['id_parent'] == 0) { /* check if the item to be deleted is parent */
			$this->db->flush_cache();
			$this->db->select('id_events_category');
			$this->db->from('events_category');
			$this->db->where('id_parent', $deleteid);
			$query = $this->db->get();
			$result = $query->result_array(); /* get all sub category */
			foreach($result as $key => $item) {
				unset($data);
				$data['clmn_id_events_category'] = 1;
				$data['whr_id_events_category'] = $item['id_events_category'];
				$params['post_data'] = $data;
				$this->dbtm->update($params); /* update all items to Uncategorized category */
				$this->dbtm->deleteItem('id_events_category', $item['id_events_category'], 'events_category'); /* delete sub category */
			}
		}
		if ($deleteid) {
			$result = $this->dbtm->deleteItem('id_events_category', $deleteid, 'events_category');
			if ($result) {
				unset($data);
				$this->db->flush_cache();
				$data['clmn_id_events_category'] = 1;
				$data['whr_id_events_category'] = $deleteid;
				$params['post_data'] = $data;
				$this->dbtm->update($params); /* update all items to Uncategorized category */
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete category.";
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
			$params['table'] = 'events_item';
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
	function _changeCategoryStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'events_category';
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
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadImage($this->temp_dir, $this->temp_thumb_dir, false, false);
	}
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
}
?>