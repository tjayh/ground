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
class Promo_manager_model extends CI_Model

{
	var $upload_dir = './upload/images/promo/';
	var $temp_dir = './temp/images/promo/';
	var $upload_thumb_dir = './upload/images/promo/thumb/';
	var $temp_thumb_dir = './temp/images/promo/thumb/';
	function __construct()
	{
		parent::__construct();
	}
	function _getCategoryHeirarchy($active = 1)
	{
		$this->db->select('*');
		$this->db->from('promo_category');
		$this->db->where('id_parent', 0);
		$this->db->where('status', $active);
		// $this->db->order_by('category_title ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $k => $item) {
				$this->db->select('*');
				$this->db->from('promo_category');
				$this->db->where('id_parent', $item['id_promo_category']);
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
	function _getCategoryList($active = 1, $has_no_parent = false)
	{
		$this->db->select('gc.*');
		$this->db->from('promo_category gc');
		// $this->db->join('promo_category gcp', 'gc.id_parent = gcp.id_promo_category');
		if ($has_no_parent) $this->db->where('id_parent', 0);
		// if($active)
		// $this->db->where('gc.status',$active);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $k => $item) {
				if ($item['id_parent'] == 0) continue;
				$this->db->select('*');
				$this->db->from('promo_category');
				$this->db->where('id_promo_category', $item['id_parent']);
				$parent_query = $this->db->get();
				if ($parent_query->num_rows() == 0) continue;
				$parent = $parent_query->row_array();
				$result[$k]['parent_title'] = $parent['category_title'];
				$result[$k]['parent_desc'] = $parent['category_desc'];
			}
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getItems()
	{
		$this->db->select('gi.*,gc.*');
		$this->db->from('promo_item gi');
		$this->db->join('promo_category gc', 'gi.id_promo_category = gc.id_promo_category');
		$this->db->where('gi.status', 1);
		$this->db->order_by('gi.image_title ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_desc'] = htmlspecialchars_decode($item['image_desc']);
				$item['date'] = date('F d, Y', strtotime($item['date']));
				$item['month'] = date('F', strtotime($item['date']));
				$item['year'] = date('Y', strtotime($item['date']));
				$item['image_link'] = base_url() . 'promo/view/' . $item['id_promo_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/promo/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/promo/' . $item['image_src'];
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
			// $params['table'] = 'promo_item';
			// $params['post_data'] = $data;
			// $params['includeDates'] = null;
			// $this->load->model('core/dbtm_model','dbtm');
			$data['link_rewrite'] = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $data['image_title']));
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			$data['date_add'] = date('Y-m-d H:i:s');
			$result = $this->db->insert('promo_item', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy favicon image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src'], $this->upload_thumb_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy favicon image to active folder.";
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
			$result = $this->db->update('promo_item', $data);
			if ($result) {
				if (!file_exists($this->upload_dir . $data['image_src'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy favicon image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
					if (!copy($this->temp_thumb_dir . $data['image_src'], $this->upload_thumb_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy favicon image to active folder.";
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
		$deleteid = $this->input->post('id_promo_item');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_promo_item', $deleteid);
			$to_delete = $this->db->get('promo_item');
			$data = $to_delete->row_array();
			if (file_exists($this->upload_dir . $data['image_src'])) {
				if (!unlink($this->upload_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_promo_item', $deleteid, 'promo_item');
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
			$params['table'] = 'promo_category';
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
			$params['table'] = 'promo_category';
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
		$deleteid = $this->input->post('id_promo_category');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_promo_category', $deleteid, 'promo_category');
			if ($result) {
				$this->db->flush_cache();
				$this->db->select('*');
				$this->db->from('promo_item');
				$this->db->where('id_promo_category', $deleteid);
				$params['table'] = 'promo_item';
				$params['includeDates'] = null;
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					unset($data);
					$data['clmn_id_promo_category'] = 1;
					$result = $query->result_array();
					foreach($result as $item) {
						$data['whr_id_promo_item'] = $item[id_promo_item];
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
	function _uploadBanner()
	{
		$config['upload_path'] = $this->temp_dir;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['encrypt_name'] = TRUE;
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$data['error'][] = $this->upload->display_errors('', '');
			echo json_encode($data);
			exit(0);
		}
		else {
			$details = $this->upload->data();
			$data['file_name'] = $details['file_name'];
		}
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $this->temp_dir . $details['file_name'];
		$config2['new_image'] = $this->temp_dir;
		$size = getimagesize($this->temp_dir . $this->upload->file_name);
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 1366;
		$config2['height'] = 1366;
		$this->load->library('image_lib', $config2);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		else {
			$data['file_name'] = $details['file_name'];
		}
		$config3['image_library'] = 'gd2';
		$config3['source_image'] = $this->temp_dir . $details['file_name'];
		$config3['new_image'] = $this->temp_thumb_dir;
		$size = getimagesize($this->temp_dir . $this->upload->file_name);
		$config3['maintain_ratio'] = TRUE;
		$config3['width'] = 366;
		$config3['height'] = 366;
		$this->image_lib->initialize($config3);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		else {
			$data['file_name'] = $details['file_name'];
		}
		echo json_encode($data);
		exit(0);
	}
	function _changeStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'promo_item';
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