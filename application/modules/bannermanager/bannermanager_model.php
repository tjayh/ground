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
class Bannermanager_model extends CI_Model

{
	var $image_dir = 'upload/images/banner/';
	var $image_thumb_dir = 'upload/images/banner/thumb/';
	var $temp_dir = './temp/images/banner/';
	var $temp_thumb_dir = './temp/images/banner/thumb/';
	var $upload_dir = './upload/images/banner/';
	var $upload_thumb_dir = './upload/images/banner/thumb/';
	function __construct()
	{
		parent::__construct();
	}
	function _getItems()
	{
		$this->db->select('ba.*');
		$this->db->from('banner ba');
		$this->db->order_by('ba.date DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_src_thumb_link'] = base_url() . $this->image_thumb_dir . $item['image_src'];
				$item['image_src2_thumb_link'] = base_url() . $this->image_thumb_dir . $item['image_src2'];
				$item['image_src_link'] = base_url() . $this->image_dir . $item['image_src'];
				$item['image_src2_link'] = base_url() . $this->image_dir . $item['image_src2'];
				$item['date'] = date('F d, Y', strtotime($item['date']));
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
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			$data['date_add'] = date('Y-m-d H:i:s');
			$result = $this->db->insert('banner', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
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
				if (!file_exists($this->upload_dir . $data['image_src2'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!is_dir($this->upload_thumb_dir)) {
						mkdir($this->upload_thumb_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src2'], $this->upload_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src2"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src2'], $this->upload_thumb_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["image_src2"])) {
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
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			$this->db->where($where);
			$to_edit = $this->db->get('banner');
			$edit_this = $to_edit->row_array();
			$this->db->where($where);
			$result = $this->db->update('banner', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
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
				if (!file_exists($this->upload_dir . $data['image_src2'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!is_dir($this->upload_thumb_dir)) {
						mkdir($this->upload_thumb_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src2'], $this->upload_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src2"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src2'], $this->upload_thumb_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_thumb_dir . $data["image_src2"])) {
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
		$deleteid = $this->input->post('id_banner');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_banner', $deleteid);
			$to_delete = $this->db->get('banner');
			$data = $to_delete->row_array();
			if (file_exists($this->upload_dir . $data['image_src'])) {
				if (!unlink($this->upload_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete thumb image to temporary folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_banner', $deleteid, 'banner');
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
					$this->db->where('id_banner', $deleteid);
					$to_delete = $this->db->get('banner');
					$data = $to_delete->row_array();
					if (file_exists($this->upload_dir . $data['image_src'])) {
						if (!unlink($this->upload_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete thumb image to temporary folder.";
						}
					}
					if (file_exists($this->upload_dir . $data['image_src2'])) {
						if (!unlink($this->upload_dir . $data['image_src2'])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!unlink($this->upload_thumb_dir . $data['image_src2'])) {
							$result['error'][] = "Failed to delete thumb image to temporary folder.";
						}
					}
					$result = $this->dbtm->deleteItem('id_banner', $deleteid, 'banner');
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
				$data['whr_id_banner'] = $item;
				$data['clmn_status'] = 1;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'banner';
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
				$data['whr_id_banner'] = $item;
				$data['clmn_status'] = 0;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'banner';
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
	function _changeStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'banner';
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
	function _uploadImage($type = false)
	{
		/*
			- type is for category or items 
			ex:
				banner_itm - for item image dimensions will be used
		*/
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadImage($this->temp_dir, $this->temp_thumb_dir, false, false, $type);
	}
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
}
?>