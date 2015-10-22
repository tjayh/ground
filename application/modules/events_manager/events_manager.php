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
		$this->template->assign('images_path', 'upload/images/events/');
	}
	function category()
	{
		$category_list = $this->events_manager->_getCategoryList();
		$category_list_select = $this->events_manager->_getCategoryList(1, 1);
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

		case 'upload-image':
			$result = $this->events_manager->_uploadImage();
			break;

		case 'upload-banner':
			$result = $this->events_manager->_uploadBanner();
			break;

		case 'change-status':
			$result = $this->events_manager->_changeStatus();
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