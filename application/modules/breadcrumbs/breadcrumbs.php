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
class Breadcrumbs extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('breadcrumbs_model', 'bc');
	}
	function index($bc_name = 'admin')
	{
		$bc = $this->bc->getBc();
		if ($bc) $this->template->assign('bc', $bc);
		$bc_list = $this->bc->getBcList($bc_name);
		$bc_tree = $this->bc->getBcTree($bc_name, 0);
		$this->template->assign('bc_list', $bc_list);
		$this->template->assign('bc_tree', $bc_tree);
		$this->template->assign('bc_name', $bc_name);
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-breadcrumb':
			$result = $this->bc->_addBc();
			break;

		case 'edit-breadcrumb':
			$result = $this->bc->_editBc();
			break;

		case 'delete-breadcrumb':
			$result = $this->bc->_deleteBc();
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
