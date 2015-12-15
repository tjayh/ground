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
class Testimonial_manager_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getItems()
	{
		$this->db->select('gi.*');
		$this->db->from('testimonial gi');
		$this->db->order_by('gi.id_testimonial ASC');
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
	function _changeStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'testimonial';
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
	function _deleteItem()
	{
		$deleteid = $this->input->post('id_testimonial');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_testimonial', $deleteid);
			$to_delete = $this->db->get('testimonial');
			$data = $to_delete->row_array();
			if (file_exists('./upload/images/testimonial/' . $data['image_src'])) {
				if (!unlink('./upload/images/testimonial/' . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_testimonial', $deleteid, 'testimonial');
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
					$this->db->where('id_testimonial_item', $deleteid);
					$to_delete = $this->db->get('testimonial_item');
					$data = $to_delete->row_array();
					if (file_exists($this->upload_dir . $data['image_src'])) {
						if (!unlink($this->upload_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
							$result['error'][] = "Failed to delete thumb image to temporary folder.";
						}
					}
					$result = $this->dbtm->deleteItem('id_testimonial_item', $deleteid, 'testimonial_item');
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
				$data['whr_id_testimonial_item'] =$item;
				$data['clmn_status'] = 1;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'testimonial_item';
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
				$data['whr_id_testimonial_item'] =$item;
				$data['clmn_status'] = 0;
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'testimonial_item';
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
}
?>