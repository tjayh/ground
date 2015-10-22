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
class Gallery_manager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_manager_model', 'gallery');
	}
	function index()
	{
		$category_list = $this->gallery->_getCategoryHeirarchy();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
		$gallery = $this->gallery->_getItems();
		$this->template->assign('gallery', $gallery);
		$this->template->assign('images_path', 'upload/images/gallery/');
	}
	function category()
	{
		$category_list = $this->gallery->_getCategoryList();
		$category_list_select = $this->gallery->_getCategoryList(1);
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
			$this->template->assign('category_list_select', $category_list_select);
		}
		$this->template->assign('images_path', 'upload/images/gallery/');
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-category':
			$result = $this->gallery->_addCategory();
			break;

		case 'edit-category':
			$result = $this->gallery->_editCategory();
			break;

		case 'delete-category':
			$result = $this->gallery->_deleteCategory();
			break;

		case 'add-item':
			$result = $this->gallery->_addItem();
			break;

		case 'edit-item':
			$result = $this->gallery->_editItem();
			break;

		case 'delete-item':
			$result = $this->gallery->_deleteItem();
			break;

		case 'upload-banner':
			$result = $this->gallery->_uploadBanner($this->uri->segment(5));
			break;

		case 'change-status':
			$result = $this->gallery->_changeStatus();
			break;

		case 'upload-image':
			$result = $this->gallery->_uploadImage();
			break;

		default:
			break;
		}
		if ($result) {
			echo json_encode($result);
		}
		else echo 'false';
		exit(0);
	}
}
?>