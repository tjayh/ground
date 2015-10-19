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
class Testimonial_manager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('testimonial_manager_model', 'testimonial_manager');
	}
	function index()
	{
		$this->template->assign('testimonial', $this->testimonial_manager->_getItems());
	}
	function category()
	{
		$category_list = $this->testimonial_manager->_getCategoryList();
		$category_list_select = $this->testimonial_manager->_getCategoryList(1, 1);
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
			$this->template->assign('category_list_select', $category_list_select);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'delete-item':
			$result = $this->testimonial_manager->_deleteItem();
			break;

		case 'change-status':
			$result = $this->testimonial_manager->_changeStatus();
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