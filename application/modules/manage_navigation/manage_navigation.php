<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Vii Framework
 *
 * @package			ViiFramework (libraries from CodeIgniter)
 * @author			ViiWorks Production Team
 * @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.
 * @website url 	http://www.viiworks.com/
 * @filesource
 *
 */
class Manage_navigation extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('manage_navigation_model', 'magnav');
	}
	function index()
	{
		$nItemsInactive = $this->magnav->_getNav(0);
		$mResultInactive = $this->magnav->_getNavHTML($nItemsInactive);
		$this->template->assign('mResultInactive', $mResultInactive);
		$navItems = $this->magnav->_getNav();
		$menuResult = $this->magnav->_getNavHTML($navItems);
		$this->template->assign('menuResult', $menuResult);
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'save-update':
			$navArray = $this->magnav->parseNavJsonArray(json_decode($this->input->post('navData') , true));
			$result = $this->magnav->changeParentId($navArray);
			break;

		case 'save-update-inactive':
			$navArray = $this->magnav->parseNavJsonArray(json_decode($this->input->post('navData') , true));
			$result = $this->magnav->changeStatus($navArray);
			break;

		case 'status':
			$this->magnav->updateNavStatus();
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