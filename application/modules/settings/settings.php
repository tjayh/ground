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
class Settings extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('settings_model', 'settings');
	}
	function index()
	{
		$fields = array(
			'site_name',
			'admin_name',
			'admin_email',
			'site_css',
			'site_logo',
			'site_favicon',
			'theme_css',
			'image_dimensions',
			'site_backgrounds'
		);
		foreach($fields as $value) {
			$item = $this->settings->get(strtoupper($value));
			if($value == 'image_dimensions'){
				$item = json_decode($item, true);
			}
			if($value == 'site_backgrounds'){
				$item = json_decode($item, true);
			}
			$this->template->assign($value, $item);
		}
		$this->template->assign('themes', $this->settings->getThemes());
		$this->template->assign('css_lists', $this->settings->getThemeCss());
		$this->template->assign('current_theme', constant('_THEME_'));
	}
	function users()
	{
		$users = $this->settings->getUsers();
		$this->template->assign('users', $users);
		$groups = $this->settings->getGroups();
		$this->template->assign('groups', $groups);
	}
	function groups()
	{
		$groups = $this->settings->getGroups();
		$this->template->assign('groups', $groups);
	}
	function modules()
	{
		$modules = $this->settings->getModules();
		$this->template->assign('modules', $modules);
	}
	function tempUpload()
	{
		$action = $this->uri->segment(4);
		$this->load->helper('string');
		$this->load->helper('file');
		switch ($action) {
		case 'user':
			$config['upload_path'] = './temp/admin/users/';
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
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

		case 'module':
			$config['upload_path'] = './temp/modules/';
			$config['allowed_types'] = 'zip';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$data = array(
					'error' => $this->upload->display_errors()
				);
			}
			else {
				$this->load->library('unzip');
				$details = $this->upload->data();
				$filename = $details['file_name'];
				$filename = str_replace(".zip", "", $filename);
				mkdir('./temp/modules/extracted/' . $filename, 0755, TRUE);
				$this->unzip->extract('./temp/modules/' . $details['file_name'], './temp/modules/extracted/' . $filename);
				$data['file_name'] = $details['file_name'];
				$result = $this->settings->checkValidModule($filename);
				if ($result['error']) $data['error'] = $result['error'];
				else {
					$data['moduleClass'] = $result['moduleClass'];
				}
			}
			break;
		}
		if ($data) {
			echo json_encode($data);
		}
		else echo 'false';
		exit(0);
	}
	function permissions()
	{
		$groups = $this->settings->getGroups();
		$this->template->assign('groups', $groups);
		if ($this->input->post('id_admin_group')) {
			$id_admin_group = $this->input->post('id_admin_group');
			$permissions = $this->settings->getPermissions($id_admin_group);
			if ($permissions) {
				echo json_encode($permissions);
			}
			else echo 'false';
			exit(0);
		}
		else {
			$id_admin_group = 1;
			$permissions = $this->settings->getPermissions($id_admin_group);
			$this->template->assign('permissions', $permissions);
		}
	}
	function server()
	{
		$this->load->helper('string');
		$this->load->library('encrypt');
		$fields = array(
			'server_url',
			'server_username',
			'server_password'
		);
		foreach($fields as $value) {
			$item = $this->settings->get(strtoupper($value));
			if (strpos($value, 'password') || strpos($value, 'pass')) {
				$item = $this->encrypt->decode($item);
			}
			$this->template->assign($value, $item);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'add-group':
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'admin_group';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				if ($this->dbtm->add($params)) {
					$result = true;
				}
				else {
					$this->error[] = "Failed to insert to vii_admin_group table.";
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'edit-group':
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'admin_group';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				$result = $this->dbtm->update($params);
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'delete-group':
			$deleteid = $this->input->post('id_admin_group');
			if ($deleteid) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->deleteItem('id_admin_group', $deleteid, 'admin_group');
				if (!$result) $this->error[] = "Failed to delete admin group.";
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'add-user':
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$data['clmn_password'] = $this->dbtm->processData2($data['clmn_password'], 'password');
				$params['table'] = 'admin';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				if ($this->dbtm->add($params)) {
					// move the picture to live folder
					if ($data['clmn_image'] && !file_exists(BASEPATH . 'temp/admin/users/' . $data['clmn_image'])) {
						if (!copy('./temp/admin/users/' . $data['clmn_image'], './upload/admin/users/' . $data['clmn_image'])) {
							$this->error[] = "Failed to move image from temp folder to active folder.";
							$result['error'] = $this->error;
						}
						else $result = true;
					}
					else $result = true;
				}
				else {
					$this->error[] = "Failed to insert to vii_admin_permission table.";
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'edit-user':
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				if ($data['clmn_password']) $data['clmn_password'] = $this->dbtm->processData2($data['clmn_password'], 'password');
				$params['table'] = 'admin';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				if ($this->dbtm->update($params)) {
					// move the picture to live folder
					if ($data['clmn_image'] && !file_exists(BASEPATH . 'temp/admin/users/' . $data['clmn_image'])) {
						if (!copy('./temp/admin/users/' . $data['clmn_image'], './upload/admin/users/' . $data['clmn_image'])) {
							$this->error[] = "Failed to move image from temp folder to active folder.";
							$result['error'] = $this->error;
						}
						else $result = true;
					}
					else $result = true;
				}
				else {
					$this->error[] = "Failed to insert to vii_admin_permission table.";
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'delete-user':
			$deleteid = $this->input->post('id_admin');
			if ($deleteid) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->deleteItem('id_admin', $deleteid, 'admin');
				if (!$result) $this->error[] = "Failed to delete module.";
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'change-permission':
			$data = $this->input->post('data');
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$params['table'] = 'admin_permission';
				$params['post_data'] = $data;
				$result = $this->dbtm->update($params);
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'upd-general':
			$data = $this->input->post('data');
			$data2 = $this->input->post('data2');
			$data['image_dimensions'] = json_encode(array_filter($data2, 'strlen')); 
			$site_bg_array = array_filter($data['site_backgrounds'], 'strlen');
			$data['site_backgrounds'] = json_encode($site_bg_array);
			
			$theme = $this->input->post('new_theme');
			if($theme != constant('_THEME_')){
				$this->settings->_changeTheme($theme);
			}
			if ($data2['old_color'] && $data2['new_color']) {
				$this->settings->_changeCss($data2['old_color'], $data2['new_color'], $theme);
			}
			if ($data) {
				$this->load->model('core/dbtm_model', 'dbtm');
				if ($data['server_password']) {
					$data['server_password'] = $this->dbtm->processData2($data['server_password'], 'encrypt-pass');
				}
				foreach($data as $name => $value) {
					$data2 = array();
					$data2['whr_name'] = $name;
					$data2['clmn_value'] = $value;
					$params['table'] = 'config';
					$params['post_data'] = $data2;
					$result = $this->dbtm->update($params);
					if (!$this->settings->_moveLogoImages()) {
						$result['error'][] = "Failed to move the logo.";
					}
					if (!$this->settings->_moveFaviconImages()) {
						$result['error'][] = "Failed to move the favicon.";
					}
					foreach($site_bg_array as $key => $item) {
						if (!$this->settings->_moveImages($item)) {
							$result['error'][] = "Failed to move the logo.";
						}
					}
					unset($data2);
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'add-module':
			$data = $this->input->post('data');
			$data_module = $data;
			$isAdmin = $data_module['clmn_isAdmin'];
			if ($data) {
				if ($data['moduleFolderName']) {
					$moduleFolderName = $data['moduleFolderName'];
					unset($data['moduleFolderName']);
				}
				$params['table'] = 'module';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				$this->load->model('core/dbtm_model', 'dbtm');
				if ($this->dbtm->add($params)) {
					$inserted = $this->settings->getLastModule();
					$groups = $this->settings->getGroups();
					foreach($groups as $item) {
						$tempData = $data;
						$data = $params = null;
						$data['clmn_id_admin_group'] = $item['id_admin_group'];
						$data['clmn_id_module'] = $inserted['id_module'];
						$data['clmn_sort_order'] = $inserted['id_module'];
						$data['clmn_isActive'] = 1;
						$params['table'] = 'admin_permission';
						$params['post_data'] = $data;
						if ($this->dbtm->add($params)) {
							if ($moduleFolderName) {
								$result = $this->settings->moveModuleFiles($moduleFolderName, $tempData['clmn_module_class'], $tempData['clmn_isAdmin']);
								if ($result['error']) $this->error = $result['error'];
							}
							else {
								$result = $this->settings->createModuleFiles($tempData['clmn_module_class'], $isAdmin);
								if ($result['error']) $this->error = $result['error'];
							}
						}
						else $this->error[] = "Failed to insert to vii_admin_permission table for user " . $item['group_name'] . ".";
					}
					$this->load->model('cms/cms_model', 'cms');
					if (!$isAdmin) {
						$data_page['clmn_custom_layout'] = _THEME_ . '/inner.template.html';
						$data_page['clmn_id_parent'] = 0;
						$data_page['clmn_content'] = '';
						$data_page['clmn_link_rewrite'] = $data_module['clmn_link_rewrite'];
						$data_page['clmn_title'] = $data_module['clmn_module_name'];
						$data_page['clmn_class'] = $data_module['clmn_link_rewrite'];
						$data_page['clmn_function'] = 'index';
						$data_page['clmn_redirect'] = 1;
						$data_page['clmn_isAdmin'] = 0;
						$page_reasult = $this->cms->_addPage($data_page);
						if ($page_result['error']) {
							$this->error[] = $page_result['error'];
						}
					}
					$this->cms->refreshRoutes();
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'edit-module':
			$data = $this->input->post('data');
			$data_module = $data;
			$isAdmin = $data_module['clmn_isAdmin'];
			if ($data) {
				if ($data['moduleFolderName']) {
					$moduleFolderName = $data['moduleFolderName'];
					unset($data['moduleFolderName']);
				}
				$params['table'] = 'module';
				$params['post_data'] = $data;
				$params['includeDates'] = 1;
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->update($params);
				if ($result) {
					$this->load->model('cms/cms_model', 'cms');
					if ($moduleFolderName) {
						$result = $this->settings->moveModuleFiles($moduleFolderName, $data['clmn_module_class'], $data['clmn_isAdmin']);
						if ($result['error']) $this->error = $result['error'];
					}
					else {
						$this->settings->createModuleFiles($data['clmn_module_class'], $isAdmin);
						if ($result['error']) $this->error = $result['error'];
						if (!$isAdmin) {
							$data_page['clmn_custom_layout'] = _THEME_ . '/inner.template.html';
							$data_page['clmn_id_parent'] = 0;
							$data_page['clmn_content'] = '';
							$data_page['clmn_link_rewrite'] = $data_module['clmn_link_rewrite'];
							$data_page['clmn_title'] = $data_module['clmn_module_name'];
							$data_page['clmn_class'] = $data_module['clmn_link_rewrite'];
							$data_page['clmn_function'] = 'index';
							$data_page['clmn_redirect'] = 1;
							$data_page['clmn_isAdmin'] = 0;
							$page_reasult = $this->cms->_addPage($data_page);
							if ($page_result['error']) {
								$this->error[] = $page_result['error'];
							}
						}
					}
					$this->cms->refreshRoutes();
				}
				else {
					$this->error[] = "Failed to update module.";
				}
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'delete-module':
			$deleteid = $this->input->post('id_module');
			if ($deleteid) {
				$this->load->model('core/dbtm_model', 'dbtm');
				$result = $this->dbtm->deleteItem('id_module', $deleteid, 'module');
				if ($result) {
					$result = $this->dbtm->deleteItem('id_module', $deleteid, 'admin_permission');
					if ($result) {
						$this->load->model('cms/cms_model', 'cms');
						$this->cms->refreshRoutes();
						$this->error[] = $moduleFolderName;
						$result['error'] = $this->error;
						echo json_encode($result);
						exit(0);
					}
					else $this->error[] = "Failed to delete module at admin_permission table.";
				}
				else $this->error[] = "Failed to delete module.";
			}
			else { //direct link access
				header('Location: ' . _BASE_URL_);
			}
			break;

		case 'upload-image':
			$type = $this->input->get('type');
			$result = $this->settings->_uploadImage($type);
			break;

		case 'upload-logo':
			$result = $this->settings->_uploadLogo();
			break;

		case 'upload-favicon':
			$result = $this->settings->_uploadFavicon();
			break;

		case 'change-status':
			$result = $this->settings->_changeStatus();
			break;

		case 'upd-style':
			$result = $this->settings->_updateStyle();
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
/* End of file Settings.php */
/* Location: ./application/controllers/modules/Settings/Settings.php */
