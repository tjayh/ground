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
class Cms extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('cms_model', 'cms');
		$this->load->helper('string');
		$this->load->model('core/paginate_model', 'paginate');
	}
	function index()
	{
		$pages = $this->cms->getPages();
		if ($pages) $this->template->assign('pages', $pages);
		$tree = $this->cms->getPagesTree();
		if ($tree) $this->template->assign('tree', $tree);
		$modules = $this->cms->getPublicModules();
		if ($modules) $this->template->assign('modules', $modules);
		$templates = $this->cms->getTemplates();
		if ($templates) $this->template->assign('templates', $templates);
	}
	function section()
	{
		$pages = $this->cms->getPages();
		if ($pages) $this->template->assign('pages', $pages);
		$tree = $this->cms->getPagesTree();
		if ($tree) $this->template->assign('tree', $tree);
		$modules = $this->cms->getPublicModules();
		if ($modules) $this->template->assign('modules', $modules);
		$templates = $this->cms->getTemplates();
		if ($templates) $this->template->assign('templates', $templates);
	}
	function section_view()
	{
		$id = $this->uri->segment(4);
		$page = $this->cms->getSections($id);
		if ($page) {
			$this->template->assign('page', $page);
			$this->template->assign('page_sections', $page['sections']);
		}
		$pages = $this->cms->getPages();
		if ($pages) {
			$this->template->assign('pages', $pages);
		}
		$section_temp = $this->cms->getSectionTemplates();
		$module_temp = $this->cms->getModuleTemplates();
		$layout_temp = $this->cms->getLayoutTemplates();
		$this->template->assign('section_temp', $section_temp);
		$this->template->assign('module_temp', $module_temp);
		$this->template->assign('layout_temp', $layout_temp);
	}
	/**
	 * Ajax Process
	 *
	 * @access	public
	 * @return	string/json
	 */
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'delete-page':
			$result = $this->cms->_deletePage();
			break;

		case 'get-specific-page':
			$result['page'] = $this->cms->getPages($this->input->post('id_page'));
			break;

		case 'add-page':
			$result = $this->cms->_addPage();
			break;

		case 'edit-page':
			$result = $this->cms->_editPage();
			break;

		case 'upload-image':
			$result = $this->cms->_uploadImage();
			break;

		case 'upload-banner':
			$result = $this->cms->_uploadBanner();
			break;

		case 'add-section':
			$result = $this->cms->_addSection();
			break;

		case 'edit-section':
			$result = $this->cms->_editSection();
			break;

		case 'delete-section':
			$result = $this->cms->_deleteSection();
			break;

		case 'update-layout':
			$result = $this->cms->_updateLayout();
			break;

		case 'update-order-section':
			$result = $this->cms->_updateOrderSection();
			break;

		default:
			break;
		}
		if ($result) {
			if (count($this->error)) $result['error'] = $this->error;
			echo json_encode($result);
		}
		else echo 'false';
		exit(0);
	}
}
/* End of file Cms.php */
/* Location: application/modules/Cms/Cms.php */
