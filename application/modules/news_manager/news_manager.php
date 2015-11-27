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
class News_manager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_manager_model', 'news_manager');
	}
	function index()
	{
		$category_list = $this->news_manager->_getCategoryHeirarchy();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
		$news = $this->news_manager->_getItems();
		$this->template->assign('news', $news);
		$this->template->assign('images_path', base_url() . 'upload/images/news/');
	}
	function category()
	{
		$category_list_parent = $this->news_manager->_getCategoryList(1);
		$category_list = $this->news_manager->_getCategoryList();
		usort($category_list, function ($a, $b)
		{
			return strcmp(strtoupper($a['parent_title']) , strtoupper($b['parent_title']));
		});
		if ($category_list_parent) {
			$this->template->assign('category_list_parent', $category_list_parent);
		}
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-category':
			$result = $this->news_manager->_addCategory();
			break;

		case 'edit-category':
			$result = $this->news_manager->_editCategory();
			break;

		case 'delete-category':
			$result = $this->news_manager->_deleteCategory();
			break;

		case 'add-item':
			$result = $this->news_manager->_addItem();
			break;

		case 'edit-item':
			$result = $this->news_manager->_editItem();
			break;

		case 'delete-item':
			$result = $this->news_manager->_deleteItem();
			break;

		case 'upload-cms-image':
			$result = $this->news_manager->_uploadCMSImage();
			break;

		case 'upload-image':
			$type = $this->input->get('type');
			$result = $this->news_manager->_uploadImage($type);
			break;

		case 'change-status':
			$result = $this->news_manager->_changeStatus();
			break;

		case 'change-category-status':
			$result = $this->news_manager->_changeCategoryStatus();
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