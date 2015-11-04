<?php
class Uploader_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('core/config_model', 'config_model');
	}
	function _uploadFile($temp_dir)
	{
		$config['upload_path'] = $temp_dir;
		$config['allowed_types'] = 'html';
		$config['encrypt_name'] = TRUE;
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}
		$this->load->library('upload', $config);
		if(!$multiple){
			if (!$this->upload->do_upload('userfile')) {
				$data['error'][] = $this->upload->display_errors('', '');
				echo json_encode($data);
				exit(0);
			}
			else {
				$details = $this->upload->data();
				$data['file_name'] = $details['file_name'];
				$this->imageResize($temp_dir, $max_width, $max_height, $details);
				$this->imageThumb($temp_dir, $temp_thumb_dir, $details);
				/* $this->imageCrop($temp_thumb_dir, $details); */
			}
		}
		else{
			foreach($_FILES as $file) {
				$_FILES['file'] = $file;
				if (!$this->upload->do_upload('file')) {
					$data['error'][] = $this->upload->display_errors('', '');
					echo json_encode($data);
					exit(0);
				}
				else {
					$details = $this->upload->data();
					$data[] = $details['file_name'];
					$this->imageResize($temp_dir, $max_width, $max_height, $details);
					$this->imageThumb($temp_dir, $temp_thumb_dir, $details);
					/* $this->imageCrop($temp_thumb_dir, $details); */
				}
			}
		}
		echo json_encode($data);
		exit(0);
	}
	function _uploadImage($temp_dir = false, $temp_thumb_dir = false, $max_width = 1600, $max_height = 1600, $multiple = false)
	{
		$config['upload_path'] = $temp_dir;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}
		$this->load->library('upload', $config);
		if(!$multiple){
			if (!$this->upload->do_upload('userfile')) {
				$data['error'][] = $this->upload->display_errors('', '');
				echo json_encode($data);
				exit(0);
			}
			else {
				$details = $this->upload->data();
				$data['file_name'] = $details['file_name'];
				$this->imageResize($temp_dir, $max_width, $max_height, $details);
				$this->imageThumb($temp_dir, $temp_thumb_dir, $details);
				/* $this->imageCrop($temp_thumb_dir, $details); */
			}
		}
		else{
			foreach($_FILES as $file) {
				$_FILES['file'] = $file;
				if (!$this->upload->do_upload('file')) {
					$data['error'][] = $this->upload->display_errors('', '');
					echo json_encode($data);
					exit(0);
				}
				else {
					$details = $this->upload->data();
					$data[] = $details['file_name'];
					$this->imageResize($temp_dir, $max_width, $max_height, $details);
					$this->imageThumb($temp_dir, $temp_thumb_dir, $details);
					/* $this->imageCrop($temp_thumb_dir, $details); */
				}
			}
		}
		echo json_encode($data);
		exit(0);
	}
	function imageResize($temp_dir, $max_width, $max_height, $details)
	{
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $temp_dir . $details['file_name'];
		$config2['new_image'] = $temp_dir;
		$size = getimagesize($temp_dir . $this->upload->file_name);
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = $max_width;
		$config2['height'] = $max_height;
		$this->load->library('image_lib', $config2);
		if (!$this->image_lib->resize()) {
			$data['error'][] = $this->image_lib->display_errors();
			echo json_encode($data);
			exit(0);
		}
		else {
			return $details['file_name'];
		}
		
	}
	function imageThumb($temp_dir, $temp_thumb_dir, $details)
	{
		$config3['image_library'] = 'gd2';
		$config3['source_image'] = $temp_dir . $details['file_name'];
		$config3['new_image'] = $temp_thumb_dir;
		$size = getimagesize($temp_dir . $this->upload->file_name);
		$config3['maintain_ratio'] = TRUE;
		$config3['width'] = 500;
		$config3['height'] = 500;
		$this->image_lib->initialize($config3);
		if (!$this->image_lib->resize()) {
			$data['error'][] = $this->image_lib->display_errors();
			echo json_encode($data);
			exit(0);
		}
		else {
			if ($details['image_type'] == 'jpeg' || $details['image_type'] == 'jpg') {
				imagejpeg(imagecreatefromstring(file_get_contents($temp_dir . $details['file_name'])) , $temp_dir . $details['file_name'], 90);
			}
			return $details['file_name'];
		}
		
	}
	function imageCrop($temp_thumb_dir, $details)
	{
		$this->image_lib->clear();
		$config4['image_library'] = 'gd2';
		$config4['source_image'] = $temp_thumb_dir . $details['file_name'];
		$config4['new_image'] = $temp_thumb_dir;
		$size = getimagesize($temp_thumb_dir . $this->upload->file_name);
		$x_axis = floor(($size[0]-274)/2);
		$y_axis = floor(($size[1]-182)/2);
		$config4['x_axis'] = $x_axis;
		$config4['y_axis'] = $y_axis;
        $config4['maintain_ratio'] = FALSE;
		$config4['width'] = 274;
		$config4['height'] = 182;
		/* print_r($config4);exit; */
		$this->image_lib->initialize($config4);
		if (!$this->image_lib->crop()) {
			$data['error'][] = $this->image_lib->display_errors();
			echo json_encode($data);
			exit(0);
		}
		else {
			if ($details['image_type'] == 'jpeg' || $details['image_type'] == 'jpg') {
				imagejpeg(imagecreatefromstring(file_get_contents($temp_dir . $details['file_name'])) , $temp_dir . $details['file_name'], 90);
			}
			return $details['file_name'];
		}
	}
	function _uploadCMSImage()
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
		else {
			echo 'false';
			exit(0);	
		}
	}
	function _uploadFavicon($temp_dir = false)
	{
		$config['upload_path'] = $temp_dir;
		$config['allowed_types'] = 'ico|png';
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
		$config2['source_image'] = $temp_dir . $details['file_name'];
		$config2['new_image'] = $temp_dir;
		$size = getimagesize($temp_dir . $this->upload->file_name);
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 32;
		$config2['height'] = 32;
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
}
?>