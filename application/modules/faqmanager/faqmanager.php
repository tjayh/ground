<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
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
class Faqmanager extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('faqmanager_model', 'faq');
	}
	function index()
	{
		$category_list = $this->faq->_getCategoryList();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
		$faq_items = $this->faq->_getAllItems();
		if ($faq_items) {
			$this->template->assign('faq_items', $faq_items);
		}
	}
	function category()
	{
		$category_list = $this->faq->_getCategoryList();
		if ($category_list) {
			$this->template->assign('category_list', $category_list);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-faq-category':
			$result = $this->faq->_addCategory();
			break;

		case 'edit-faq-category':
			$result = $this->faq->_editCategory();
			break;

		case 'delete-faq-category':
			$result = $this->faq->_deleteCategory();
			break;

		case 'add-faq-item':
			$result = $this->faq->_addItem();
			break;

		case 'edit-faq-item':
			$result = $this->faq->_editItem();
			break;

		case 'delete-faq-item':
			$result = $this->faq->_deleteItem();
			break;

		case 'change-status':
			$result = $this->faq->_changeStatus();
			break;

		case 'upload-image':
			$result = $this->faq->_uploadImage();
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
