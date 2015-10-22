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
	var $upload_dir = './upload/images/banner/';
	var $temp_dir = './temp/images/banner/';
	function __construct()
	{
		parent::__construct();
	}
	function _getItems()
	{
		$this->db->select('ba.*');
		$this->db->from('banner ba');
		$this->db->order_by('ba.id_banner ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
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
				}
				if (!file_exists($this->upload_dir . $data['image_src2'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src2'], $this->upload_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src2"])) {
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
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src"])) {
						$result['error'][] = "Failed to delete image to temporary folder.";
					}
				}
				if (!file_exists($this->upload_dir . $data['image_src2'])) {
					if (!is_dir($this->upload_dir)) {
						mkdir($this->upload_dir, 0777, TRUE);
					}
					if (!copy($this->temp_dir . $data['image_src2'], $this->upload_dir . $data['image_src2'])) {
						$result['error'][] = "Failed to copy image to active folder.";
					}
					if (!unlink($this->temp_dir . $data["image_src2"])) {
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
			}
			$result = $this->dbtm->deleteItem('id_banner', $deleteid, 'banner');
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
	function _uploadBanner()
	{
		$config['upload_path'] = $this->temp_dir;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['encrypt_name'] = TRUE;
		// $config['max_width']  = '1920';
		// $config['max_height']  = '693';
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
			// if($details['image_width'] < 1920  && $details['image_height'] < 693){
			// $data['error'][]= 'The image you are attempting to upload exceedes the maximum height or width.';
			// if (!unlink('./upload/temp/upload_temp/banner/' . $details['file_name'])) {
			// $result['error'][] = "Failed to delete image to temporary folder.";
			// }
			// echo json_encode($data);
			// exit(0);
			// }
		}
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $this->temp_dir . $details['file_name'];
		$config2['new_image'] = $this->temp_dir;
		$size = getimagesize($this->temp_dir . $this->upload->file_name);
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 1920;
		$config2['height'] = 1920;
		$this->load->library('image_lib', $config2);
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