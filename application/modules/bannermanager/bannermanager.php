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
class Bannermanager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('bannermanager_model', 'bannermanager');
	}
	function index()
	{
		$this->template->assign('banner', $this->bannermanager->_getItems());
		$this->template->assign('images_path', 'upload/images/banner/');
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-item':
			$result = $this->bannermanager->_addItem();
			break;

		case 'edit-item':
			$result = $this->bannermanager->_editItem();
			break;

		case 'delete-item':
			$result = $this->bannermanager->_deleteItem();
			break;

		case 'upload-banner':
			$result = $this->bannermanager->_uploadBanner();
			break;

		case 'upload-image':
			$result = $this->bannermanager->_uploadImage();
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