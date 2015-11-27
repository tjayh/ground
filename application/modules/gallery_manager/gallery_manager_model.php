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
class Gallery_manager_model extends CI_Model

{
	var $image_dir = 'upload/images/gallery/';
	var $image_thumb_dir = 'upload/images/gallery/thumb/';
	var $temp_dir = './temp/images/gallery/';
	var $temp_thumb_dir = './temp/images/gallery/thumb/';
	var $upload_dir = './upload/images/gallery/';
	var $upload_thumb_dir = './upload/images/gallery/thumb/';
	function __construct()
	{
		parent::__construct();
	}
	function _getCategoryHeirarchy($active = 1)
	{
		$this->db->select('*');
		$this->db->from('gallery_category');
		$this->db->where('id_parent', 0);
		$this->db->where('status', $active);
		// $this->db->order_by('category_title ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $k => $item) {
				$this->db->select('*');
				$this->db->from('gallery_category');
				$this->db->where('id_parent', $item['id_gallery_category']);
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
		$this->db->from('gallery_category gc');
		$this->db->where('id_gallery_category !=', 1);
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
				$this->db->from('gallery_category');
				$this->db->where('id_gallery_category', $item['id_parent']);
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
		$this->db->select('gi.*, gc.category_title as category, gi.status as status');
		$this->db->from('gallery_item gi');
		$this->db->join('gallery_category gc', 'gc.id_gallery_category = gi.id_gallery_category', 'left');
		$this->db->order_by('gi.id_gallery_item DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_desc'] = htmlspecialchars_decode($item['image_desc']);
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
			$result = true;
			$data['date_add'] = date('Y-m-d H:i:s');
			foreach($data['image_src'] as $k => $img) {
				$result = ($result && $this->db->insert('gallery_item', array(
					'status' => $data['status'],
					'id_gallery_category' => $data['id_gallery_category'],
					'image_meta_title' => $data['image_meta_title'][$k],
					'image_meta_description' => $data['image_meta_description'][$k],
					'image_meta_keywords' => $data['image_meta_keywords'][$k],
					'image_title' => $data['image_title'][$k],
					'link_rewrite' => strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['image_title'][$k])) ,
					'image_sub_title' => $data['image_sub_title'][$k],
					'image_desc' => $data['image_desc'][$k],
					'image_src' => $img
				)));
			}
			if ($result) {
				foreach($data['image_src'] as $k => $img) {
					if (!file_exists($this->upload_dir . $img)) {
						if (!is_dir($this->upload_dir)) {
							mkdir($this->upload_dir, 0777, TRUE);
						}
						if (!copy($this->temp_dir . $img, $this->upload_dir . $img)) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_dir . $img)) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!copy($this->temp_thumb_dir . $img, $this->upload_thumb_dir . $img)) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_thumb_dir . $img)) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
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
			$data2 = array();
			foreach($data['image_src'] as $k => $img) {
				$data2['status'] = $data['status'];
				$data2['id_gallery_category'] = $data['id_gallery_category'];
				$data2['image_meta_title'] = $data['image_meta_title'][$k];
				$data2['image_meta_description'] = $data['image_meta_description'][$k];
				$data2['image_meta_keywords'] = $data['image_meta_keywords'][$k];
				$data2['image_title'] = $data['image_title'][$k];
				$data2['link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data2['image_title']));
				$data2['image_sub_title'] = $data['image_sub_title'][$k];
				$data2['image_desc'] = $data['image_desc'][$k];
				$data2['image_src'] = $img;
			}
			// delete image
			$this->db->where($where);
			$result = $this->db->update('gallery_item', $data2);
			if ($result) {
				foreach($data['image_src'] as $k => $img) {
					if (!file_exists($this->upload_dir . $img)) {
						if (!is_dir($this->upload_dir)) {
							mkdir($this->upload_dir, 0777, TRUE);
						}
						if (!copy($this->temp_dir . $img, $this->upload_dir . $img)) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_dir . $img)) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!copy($this->temp_thumb_dir . $img, $this->upload_thumb_dir . $img)) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_thumb_dir . $img)) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update gallery item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteItem($deleteid)
	{
		if($this->input->post('id_gallery_item')){
			$deleteid = $this->input->post('id_gallery_item');
		}
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_gallery_item', $deleteid);
			$to_delete = $this->db->get('gallery_item');
			$data = $to_delete->row_array();
			if (file_exists($this->upload_dir . $data['image_src'])) {
				if (!unlink($this->upload_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete thumb image to temporary folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_gallery_item', $deleteid, 'gallery_item');
			if ($result) {
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete gallery item.";
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
			$data['clmn_link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['clmn_category_title']));
			$params['table'] = 'gallery_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->add($params)) {
				if (!file_exists($this->upload_dir . $data['clmn_image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['clmn_image_src'], $this->upload_dir . $data['clmn_image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["clmn_image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['clmn_image_src'], $this->upload_thumb_dir . $data['clmn_image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["clmn_image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to add gallery item.";
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
			$data['clmn_link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['clmn_category_title']));
			$params['table'] = 'gallery_category';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			if ($this->dbtm->update($params)) {
				if (!file_exists($this->upload_dir . $data['clmn_image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['clmn_image_src'], $this->upload_dir . $data['clmn_image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["clmn_image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['clmn_image_src'], $this->upload_thumb_dir . $data['clmn_image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["clmn_image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to update gallery item.";
				return $result;
			}
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteCategory()
	{
		$deleteid = $this->input->post('id_gallery_category');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_gallery_category', $deleteid, 'gallery_category');
			if ($result) {
				$this->db->flush_cache();
				$this->db->select('*');
				$this->db->from('gallery_item');
				$this->db->where('id_gallery_category', $deleteid);
				$params['table'] = 'gallery_item';
				$params['includeDates'] = null;
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$result = $query->result_array();
					foreach($result as $item) {
						$this->_deleteItem($item['id_gallery_item']);
					}
				}
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete gallery category.";
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
			$params['table'] = 'gallery_item';
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
			$params['table'] = 'gallery_category';
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
	function _uploadImage($multiple = false, $type = false)
	{
		/*
			- multiple is used for gallery only
			- type is for category or items 
			ex:
				gallery_cat - for category image dimensions will be used
				gallery_itm - for item image dimensions will be used
		*/
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadImage($this->temp_dir, $this->temp_thumb_dir, false, false, $type, $multiple);
	}
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
}
?>