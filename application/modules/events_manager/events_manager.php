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
class Events_manager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('events_manager_model', 'events_manager');
	}
	function index()
	{
		$category_list = $this->events_manager->_getCategoryHeirarchy();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
		$events = $this->events_manager->_getItems();
		$this->template->assign('events', $events);
		$this->template->assign('images_path', base_url() . 'upload/images/events/');
	}
	function category()
	{
		$category_list_parent = $this->events_manager->_getCategoryList(1);
		$category_list = $this->events_manager->_getCategoryList();
		usort($category_list, function ($a, $b)
		{
			return strcmp(strtoupper($a['parent_title']) , strtoupper($b['parent_title']));
		});
		if ($category_list_parent) {
			$this->template->assign('category_list_parent', $category_list_parent);
		}
		if ($category_list) {
			/* print_r($category_list);exit; */
			$this->template->assign('category_list', $category_list);
		}
		$this->template->assign('images_path', base_url() . 'upload/images/events/');
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-category':
			$result = $this->events_manager->_addCategory();
			break;

		case 'edit-category':
			$result = $this->events_manager->_editCategory();
			break;

		case 'delete-category':
			$result = $this->events_manager->_deleteCategory();
			break;

		case 'add-item':
			$result = $this->events_manager->_addItem();
			break;

		case 'edit-item':
			$result = $this->events_manager->_editItem();
			break;

		case 'delete-item':
			$result = $this->events_manager->_deleteItem();
			break;
			
		case 'multiple-item-action':
			$result = $this->events_manager->_multipleActionItem();
			break;

		case 'upload-cms-image':
			$result = $this->events_manager->_uploadCMSImage();
			break;

		case 'upload-image':
			$type = $this->input->get('type');
			$result = $this->events_manager->_uploadImage($type);
			break;

		case 'change-status':
			$result = $this->events_manager->_changeStatus();
			break;

		case 'change-category-status':
			$result = $this->events_manager->_changeCategoryStatus();
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