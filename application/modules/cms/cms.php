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
		$pages = $this->cms->getPages(false, true);
		if ($pages) {
			$this->template->assign('pages', $pages);
		}
		$tree = $this->cms->getPagesTree();
		if ($tree) {
			$this->template->assign('tree', $tree);
		}
		$modules = $this->cms->getPublicModules();
		if ($modules) {
			$this->template->assign('modules', $modules);
		}
		$templates = $this->cms->getTemplates();
		if ($templates) {
			$this->template->assign('templates', $templates);
		}
		$this->template->assign('images_path', base_url() . 'upload/images/banner/');
	}
	function section()
	{
		$pages = $this->cms->getPages(false, false);
		if ($pages) {
			$this->template->assign('pages', $pages);
		}
		$tree = $this->cms->getPagesTree();
		if ($tree) {
			$this->template->assign('tree', $tree);
		}
		$modules = $this->cms->getPublicModules();
		if ($modules) {
			$this->template->assign('modules', $modules);
		}
		if ($templates) {
			$this->template->assign('templates', $templates);
		}
		$templates = $this->cms->getTemplates();
	}
	function section_view()
	{
		$id = $this->uri->segment(4);
		$page = $this->cms->getSections($id);
		if ($page) {
			$this->template->assign('page', $page);
			$this->template->assign('page_sections', $page['sections']);
		}
		$pages = $this->cms->getPages(false, true);
		if ($pages) {
			$this->template->assign('pages', $pages);
		}
		$page_temp = $this->cms->getSectionTemplates(false, 'page');
		$module_temp = $this->cms->getSectionTemplates(false, 'module');
		$layout_temp = $this->cms->getLayoutTemplates();
		$this->template->assign('page_temp', $page_temp);
		$this->template->assign('module_temp', $module_temp);
		$this->template->assign('layout_temp', $layout_temp);
	}
	function section_list()
	{
		$sectionLists = $this->cms->getSectionTemplates();
		$this->template->assign('section_lists', $sectionLists);
		$this->template->assign('images_path', base_url() . 'upload/images/section/');
		$modules = $this->cms->getPublicModules();
		if ($modules) {
			$this->template->assign('modules', $modules);
		}
	}
	function tempUpload()
	{
		$action = $this->uri->segment(4);
		$this->load->helper('string');
		$this->load->helper('file');
		switch ($action) {
		case 'file':
			$config['upload_path'] = './temp/admin/';
			$config['allowed_types'] = 'html';
			$config['encrypt_name'] = TRUE;
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$data = array(
					'error' => $this->upload->display_errors()
				);
			}
			else {
				$details = $this->upload->data();
				$data['file_name'] = $details['file_name'];
			}
			break;
		}
		if ($data) {
			echo json_encode($data);
		}
		else echo 'false';
		exit(0);
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
			$result['page'] = $this->cms->getPages($this->input->post('id_page') , true);
			break;

		case 'add-page':
			$result = $this->cms->_addPage();
			break;

		case 'edit-page':
			$result = $this->cms->_editPage();
			break;

		case 'upload-cms-image':
			$result = $this->cms->_uploadCMSImage();
			break;

		case 'upload-image':
			$type = $this->input->get('type');
			$result = $this->cms->_uploadImage($type);
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

		case 'add-section-file':
			$result = $this->cms->_addSectionFile();
			break;

		case 'edit-section-file':
			$result = $this->cms->_editSectionFile();
			break;

		case 'delete-section-file':
			$result = $this->cms->_deleteSectionFile();
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
