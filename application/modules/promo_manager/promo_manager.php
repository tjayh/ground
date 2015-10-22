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
class Promo_manager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('promo_manager_model', 'promo_manager');
	}
	function index()
	{
		$category_list = $this->promo_manager->_getCategoryHeirarchy();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
		$promo = $this->promo_manager->_getItems();
		$this->template->assign('promo', $promo);
		$this->template->assign('images_path', 'upload/images/promo/');
	}
	function category()
	{
		$category_list = $this->promo_manager->_getCategoryList();
		$category_list_select = $this->promo_manager->_getCategoryList(1, 1);
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
			$this->template->assign('category_list_select', $category_list_select);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-category':
			$result = $this->promo_manager->_addCategory();
			break;

		case 'edit-category':
			$result = $this->promo_manager->_editCategory();
			break;

		case 'delete-category':
			$result = $this->promo_manager->_deleteCategory();
			break;

		case 'add-item':
			$result = $this->promo_manager->_addItem();
			break;

		case 'edit-item':
			$result = $this->promo_manager->_editItem();
			break;

		case 'delete-item':
			$result = $this->promo_manager->_deleteItem();
			break;

		case 'upload-banner':
			$result = $this->promo_manager->_uploadBanner();
			break;

		case 'upload-image':
			$result = $this->promo_manager->_uploadImage();
			break;

		case 'change-status':
			$result = $this->bannermanager->_changeStatus();
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