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
class Cms_model extends CI_Model

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
	}
	function getPages($id_page = false)
	{
		$this->db->select('p.*,pt.*, p.class as module_name, p.function as function_name, m.id_module');
		$this->db->from('page p');
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->join('module m', ' m.module_class = p.class', 'left');
		$this->db->where('p.isAdmin', 0);
		$this->db->where('m.isActive', 1);
		if ($id_page) {
			$this->db->where('p.id_page', $id_page);
		}
		$this->db->order_by("pt.absolute_link", "asc");
		$this->db->order_by("p.title", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if ($id_page) {
				return $return[0];
			}
			return $return;
		}
		return false;
	}
	function getSections($id_page)
	{
		$this->db->select('p.*');
		$this->db->from('page p');
		$this->db->where('p.id_page', $id_page);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$return = array();
			$sections_decoded = json_decode($result['sections'], JSON_FORCE_OBJECT);
			$layout_decoded = json_decode($result['layout'], JSON_FORCE_OBJECT);
			$result['sections'] = $sections_decoded;
			$result['layout'] = $layout_decoded;
			$result['layout']['html_file'] = '/default/includes/layout_templates/' . $result['layout']['filename'] . '.html';
			foreach($result['sections']['col0'] as $key => $item) { // get section details
				$item['key_section'] = $key;
				if ($item['content_type'] == 'module') {
					$pull_temp = 'module_templates';
				}
				else {
					$pull_temp = 'section_templates';
				}
				$item['template_html'] = '/default/includes/' . $pull_temp . '/' . $item['template_name'] . '.html';
				foreach($item['pages'] as $key2 => $item2) {
					$page_data = $this->getPages($item2);
					unset($page_data['json']);
					$item['pages'][$key2] = $page_data;
				}
				$item['id_page'] = $result['id_page'];
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return['col0'][] = $item;
			}
			foreach($result['sections']['col1'] as $key => $item) { // get section details
				$item['key_section'] = $key;
				if ($item['content_type'] == 'module') {
					$pull_temp = 'module_templates';
				}
				else {
					$pull_temp = 'section_templates';
				}
				$item['template_html'] = '/default/includes/' . $pull_temp . '/' . $item['template_name'] . '.html';
				foreach($item['pages'] as $key2 => $item2) {
					$page_data = $this->getPages($item2);
					unset($page_data['json']);
					$item['pages'][$key2] = $page_data;
				}
				$item['id_page'] = $result['id_page'];
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return['col1'][] = $item;
			}
			foreach($result['sections']['col2'] as $key => $item) { // get section details
				$item['key_section'] = $key;
				if ($item['content_type'] == 'module') {
					$pull_temp = 'module_templates';
				}
				else {
					$pull_temp = 'section_templates';
				}
				$item['template_html'] = '/default/includes/' . $pull_temp . '/' . $item['template_name'] . '.html';
				foreach($item['pages'] as $key2 => $item2) {
					$page_data = $this->getPages($item2);
					unset($page_data['json']);
					$item['pages'][$key2] = $page_data;
				}
				$item['id_page'] = $result['id_page'];
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return['col2'][] = $item;
			}
			foreach($result['sections']['col3'] as $key => $item) { // get section details
				$item['key_section'] = $key;
				if ($item['content_type'] == 'module') {
					$pull_temp = 'module_templates';
				}
				else {
					$pull_temp = 'section_templates';
				}
				$item['template_html'] = '/default/includes/' . $pull_temp . '/' . $item['template_name'] . '.html';
				foreach($item['pages'] as $key2 => $item2) {
					$page_data = $this->getPages($item2);
					unset($page_data['json']);
					$item['pages'][$key2] = $page_data;
				}
				$item['id_page'] = $result['id_page'];
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return['col3'][] = $item;
			}
			$result['sections'] = $return;
			return $result;
		}
		return false;
	}
	function getPagesTree($id_parent = 0)
	{
		$id_page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$this->db->select('p.link_rewrite, p.title, pt.absolute_link,  pt.*');
		$this->db->from('page p');
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->where('pt.id_parent', $id_parent);
		$this->db->where('p.isAdmin', 0);
		$this->db->where('p.id_page !=', $id_page);
		$query = $this->db->get();
		$pages = $query->result_array();
		$temp_tree = array();
		$tree = array();
		foreach($pages as $page) {
			$parent = $this->db->get_where('page_tree', array(
				'id_parent' => $page['id_page']
			));
			$page['child'] = $parent->num_rows();
			$temp_tree[] = $page;
		}
		if (count($temp_tree)) {
			foreach($temp_tree as $child) {
				if ($child['child']) {
					$child['pages'] = $this->getPagesTree($child['id_page']);
				}
				$tree[] = $child;
			}
		}
		return $tree;
	}
	function getPublicModules()
	{
		$this->db->select('*');
		$this->db->from('module');
		$this->db->where('isAdmin', 0);
		$this->db->order_by('module_name', 'ASC');
		$query = $this->db->get();
		if (!$query->num_rows()) return false;
		return $query->result_array();
	}
	function getTemplates()
	{
		$this->load->helper('directory');
		$themes = directory_map(_SKIN_URL_, 1);
		$templates = array();
		foreach($themes as $theme) {
			if ($theme != 'email_templates' && $theme != 'admin' && $theme != _ADMIN_THEME_) {
				$files = directory_map(_SKIN_URL_ . $theme, 1);
				foreach($files as $file) {
					if (is_file(_SKIN_URL_ . $theme . '/' . $file) && $file != 'index.html') $templates[] = $theme . '/' . $file;
				}
			}
		}
		return $templates;
	}
	function getSectionTemplates()
	{
		$this->load->helper('directory');
		$templates = array();
		$theme = 'default';
		$folders = directory_map(_SKIN_URL_ . $theme, 1);
		$sub = directory_map(_SKIN_URL_ . 'default/includes/section_templates/', 1);
		foreach($sub as $file) {
			$temp = pathinfo($file);
			$file_name = basename($file, '.' . $temp['extension']);
			$templates[] = $file_name;
		}
		return $templates;
	}
	function getLayoutTemplates()
	{
		$this->load->helper('directory');
		$templates = array();
		$theme = 'default';
		$folders = directory_map(_SKIN_URL_ . $theme, 1);
		$sub = directory_map(_SKIN_URL_ . 'default/includes/layout_templates/', 1);
		foreach($sub as $file) {
			$temp = pathinfo($file);
			$file_name = basename($file, '.' . $temp['extension']);
			$templates[] = $file_name;
		}
		return $templates;
	}
	function getModuleTemplates()
	{
		$this->load->helper('directory');
		$templates = array();
		$theme = 'default';
		$folders = directory_map(_SKIN_URL_ . $theme, 1);
		$sub = directory_map(_SKIN_URL_ . 'default/includes/module_templates/', 1);
		foreach($sub as $file) {
			$temp = pathinfo($file);
			$file_name = basename($file, '.' . $temp['extension']);
			$templates[] = $file_name;
		}
		return $templates;
	}
	function getLinkRewrite($id_parent, $link_rewrite)
	{
		if ($id_parent) {
			$link = '';
			while ($id_parent > 0) {
				if (strlen($link)) $link = '/' . $link;
				$this->db->select('p.link_rewrite, pt.id_parent, pt.depth');
				$this->db->from('page p');
				$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
				$this->db->where('p.id_page', $id_parent);
				$query = $this->db->get();
				$page = $query->row_array();
				$link = $page['link_rewrite'] . $link;
				$id_parent = $page['id_parent'];
				$depth = $page['depth'];
			}
			return $link . '/' . $link_rewrite;
		}
		else {
			return $link_rewrite;
		}
	}
	function getDepth($id_parent)
	{
		if ($id_parent) {
			$d = $this->db->get_where('page_tree', array(
				'id_page' => $id_parent
			));
			$r = $d->row_array();
			return $r['depth'] + 1;
		}
		else {
			return 1;
		}
	}
	function _addPage($data_page = false)
	{
		if ($data_page) {
			$data = $data_page;
		}
		else {
			$data = $this->input->post('data');
		}
		if ($data) {
			list($data['clmn_custom_theme'], $data['clmn_custom_layout']) = explode('/', $data['clmn_custom_layout']);
			$id_parent = $data['clmn_id_parent'];
			unset($data['clmn_id_parent']);
			if ($data['clmn_content'] == '<p><br /></p>') {
				$data['clmn_content'] = '';
			}
			$params['table'] = 'page';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->add($params);
			if ($result) {
				$tree['clmn_id_page'] = $this->db->insert_id();
				if (!$this->input->post('admin')) {
					$tree['clmn_id_parent'] = $id_parent;
					$tree['clmn_absolute_link'] = $this->getLinkRewrite($tree['clmn_id_parent'], $data['clmn_link_rewrite']);
					$tree['clmn_depth'] = $this->getDepth($tree['clmn_id_parent']);
					$params['table'] = 'page_tree';
					$params['post_data'] = $tree;
					$params['includeDates'] = null;
					$result = $this->dbtm->add($params);
					if (!$result) $this->error[] = "Failed to insert at page_tree table.";
					if (!file_exists('./upload/images/banner/' . $data['clmn_image_src'])) {
						if (!is_dir('./upload/images/banner/')) {
							mkdir('./upload/images/banner/', 0777, TRUE);
						}
						if (!copy('./temp/images/banner/' . $data['clmn_image_src'], './upload/images/banner/' . $data['clmn_image_src'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink('./temp/images/banner/' . $data["clmn_image_src"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
					if (!file_exists('./upload/images/banner/' . $data['clmn_meta_image'])) {
						if (!is_dir('./upload/images/banner/')) {
							mkdir('./upload/images/banner/', 0777, TRUE);
						}
						if (!copy('./temp/images/banner/' . $data['clmn_meta_image'], './upload/images/banner/' . $data['clmn_meta_image'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink('./temp/images/banner/' . $data["clmn_meta_image"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
				}
				$this->refreshRoutes();
			}
			else {
				$this->error[] = "Failed to insert at page table.";
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
		if (count($this->error)) {
			unset($result);
			$result['error'] = $this->error;
			return $result;
		}
		else return true;
	}
	function _editPage()
	{
		$data = $this->input->post('data');
		if ($data) {
			list($data['clmn_custom_theme'], $data['clmn_custom_layout']) = explode('/', $data['clmn_custom_layout']);
			$id_parent = $data['clmn_id_parent'];
			unset($data['clmn_id_parent']);
			if ($data['clmn_content'] == '<p><br /></p>') {
				$data['clmn_content'] = '';
			}
			if ($data['clmn_caption'] == '<p><br /></p>') {
				$data['clmn_caption'] = '';
			}
			$params['table'] = 'page';
			$params['post_data'] = $data;
			$params['includeDates'] = null;
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->update($params);
			if ($result) {
				$tree['whr_id_page'] = $data['whr_id_page'];
				if (!$this->input->post('admin')) {
					$tree['clmn_id_parent'] = $id_parent;
					$tree['clmn_absolute_link'] = $this->getLinkRewrite($tree['clmn_id_parent'], $data['clmn_link_rewrite']);
					$tree['clmn_depth'] = $this->getDepth($tree['clmn_id_parent']);
					$params['table'] = 'page_tree';
					$params['post_data'] = $tree;
					$params['includeDates'] = null;
					$result = $this->dbtm->update($params);
					if (!$result) $this->error[] = "Failed to update at page_tree table.";
					if (!file_exists('./upload/images/banner/' . $data['clmn_image_src'])) {
						if (!is_dir('./upload/images/banner/')) {
							mkdir('./upload/images/banner/', 0777, TRUE);
						}
						if (!copy('./temp/images/banner/' . $data['clmn_image_src'], './upload/images/banner/' . $data['clmn_image_src'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink('./temp/images/banner/' . $data["clmn_image_src"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
					if (!file_exists('./upload/images/banner/' . $data['clmn_meta_image'])) {
						if (!is_dir('./upload/images/banner/')) {
							mkdir('./upload/images/banner/', 0777, TRUE);
						}
						if (!copy('./temp/images/banner/' . $data['clmn_meta_image'], './upload/images/banner/' . $data['clmn_meta_image'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink('./temp/images/banner/' . $data["clmn_meta_image"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
				}
				$this->refreshRoutes();
			}
			else {
				$this->error[] = "Failed to update at page table.";
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
		if (count($this->error)) {
			unset($result);
			$result['error'] = $this->error;
			return $result;
		}
		else return true;
	}
	function _addSection()
	{
		$this->db->flush_cache();
		$data = $this->input->post('data');
		$where = $this->input->post('where');
		$id_page = $where['id_page'];
		$column = $where['column'];
		$selected = $data['pages'];
		$data['pages'] = explode(",", $selected);
		$this->db->select('p.*');
		$this->db->from('page p');
		$this->db->where('id_page', $id_page);
		$query = $this->db->get();
		if ($data) {
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$return = array();
				if (empty($result['sections'])) { // no section save
					$sections_encoded[$column] = array(
						$data
					);
					$sections_encoded = json_encode($sections_encoded, JSON_FORCE_OBJECT);
					$this->db->flush_cache();
					$data_upd['sections'] = $sections_encoded;
					$this->db->where('id_page', $id_page);
					$result = $this->db->update('page', $data_upd);
					return $result;
				}
				else { // update existing section
					$sections_decoded = json_decode($result['sections'], JSON_FORCE_OBJECT);
					$col_sec = $sections_decoded[$column];
					if ($sections_decoded[$column]) {
						array_push($sections_decoded[$column], $data);
					}
					else {
						$sections_decoded[$column][] = $data;
					}
					$sections_encoded = json_encode($sections_decoded, JSON_FORCE_OBJECT);
					$this->db->flush_cache();
					$data_upd['sections'] = $sections_encoded;
					$this->db->where('id_page', $id_page);
					$result = $this->db->update('page', $data_upd);
					return $result;
				}
			}
		}
	}
	function _editSection()
	{
		$where = $this->input->post('where');
		$id_page = $where['id_page'];
		$this->db->select('p.*');
		$this->db->from('page p');
		$this->db->where('id_page', $id_page);
		$query = $this->db->get();
		$data = $this->input->post('data');
		$selected = $data['pages'];
		$data['pages'] = explode(",", $selected);
		$key_section = $where['key_section'];
		$column = $where['column'];
		if ($data) {
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$return = array();
				foreach($result as $key => $item) {
					$item['sections'] = $item['sections'];
					$sections_decoded = json_decode($item['sections'], JSON_FORCE_OBJECT);
					$sections_decoded[$column][$key_section]['section_title'] = $data['section_title'];
					$sections_decoded[$column][$key_section]['section_subtitle'] = $data['section_subtitle'];
					$sections_decoded[$column][$key_section]['template_name'] = $data['template_name'];
					$sections_decoded[$column][$key_section]['pages'] = $data['pages'];
					$sections_encoded = json_encode($sections_decoded, JSON_FORCE_OBJECT);
					$this->db->flush_cache();
					$data_upd['sections'] = $sections_encoded;
					$this->db->where('id_page', $id_page);
					$result = $this->db->update('page', $data_upd);
					return $result;
				}
			}
		}
	}
	function _deletePage()
	{
		$where['id_page'] = $this->input->post('id_page');
		if ($this->db->delete('page', $where)) {
			if (!$this->db->delete('page_tree', $where)) {
				$this->error[] = "Failed to delete page from page table.";
			}
		}
		else {
			$this->error[] = "Failed to delete page from page table.";
		}
		if (count($this->error)) {
			$result['error'] = $this->error;
			return $result;
		}
		else {
			$this->refreshRoutes();
			return true;
		}
	}
	function _deleteSection()
	{
		$this->db->flush_cache();
		$id_page = $this->input->post('id_page');
		$key_section = $this->input->post('key_section');
		$column = $this->input->post('column');
		$this->db->select('p.*');
		$this->db->from('page p');
		$this->db->where('id_page', $id_page);
		$query = $this->db->get();
		if ($column) {
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$return = array();
				$sections_decoded = json_decode($result['sections'], JSON_FORCE_OBJECT);
				unset($sections_decoded[$column][$key_section]);
				$sections_encoded = json_encode($sections_decoded, JSON_FORCE_OBJECT);
				$this->db->flush_cache();
				$data_upd['sections'] = $sections_encoded;
				$this->db->where('id_page', $id_page);
				$result = $this->db->update('page', $data_upd);
				return $result;
			}
		}
	}
	function _updateLayout()
	{
		$this->db->flush_cache();
		$layout = $this->input->post('layout');
		$layout_array = explode('_', $layout);
		$data['columns'] = end($layout_array);
		array_pop($layout_array);
		$data['filename'] = $layout;
		switch (end($layout_array)) {
		case 'v1':
			$data['format'] = '12_0_0_0';
			break;

		case 'v2':
			$data['format'] = '6_6_0_0';
			break;

		case 'v3':
			$data['format'] = '3_9_0_0';
			break;

		case 'v4':
			$data['format'] = '9_3_0_0';
			break;

		case 'v5':
			$data['format'] = '4_4_4_0';
			break;

		case 'v6':
			$data['format'] = '6_3_3_0';
			break;

		case 'v7':
			$data['format'] = '3_6_3_0';
			break;

		case 'v8':
			$data['format'] = '3_3_6_0';
			break;

		case 'v9':
			$data['format'] = '3_3_3_3';
			break;

		default:
			break;
		}
		$id_page = $this->input->post('id_page');
		$data_upd['layout'] = json_encode($data, JSON_FORCE_OBJECT);;
		$this->db->where('id_page', $id_page);
		$result = $this->db->update('page', $data_upd);
		return $result;
	}
	function _updateOrderSection()
	{
		$this->db->flush_cache();
		$id_page = $this->input->post('id_page');
		$column = $this->input->post('column');
		$sec_order = json_decode($this->input->post('sec_order') , JSON_FORCE_OBJECT);
		$this->db->select('p.*');
		$this->db->from('page p');
		$this->db->where('id_page', $id_page);
		$query = $this->db->get();
		if ($id_page && $sec_order && $column) {
			$result = $query->row_array();
			$return = array();
			$sections_decoded = json_decode($result['sections'], JSON_FORCE_OBJECT);
			$sections_decoded_base = json_decode($result['sections'], JSON_FORCE_OBJECT);
			foreach($sec_order as $key => $item) {
				$sections_decoded[$column][$key] = $sections_decoded_base[$column][$item];
			}
			$sections_encoded = json_encode($sections_decoded, JSON_FORCE_OBJECT);
			$this->db->flush_cache();
			$data_upd['sections'] = $sections_encoded;
			$this->db->where('id_page', $id_page);
			$result = $this->db->update('page', $data_upd);
			return $result;
		}
	}
	function refreshRoutes()
	{
		$this->buildRoutesFrontend();
		$this->buildRoutesBackend();
	}
	function buildRoutesFrontend()
	{
		$this->db->select_max('depth');
		$query = $this->db->get('page_tree');
		$res = $query->row_array();
		$pages = $this->getPagesByDepth($res['depth']);
		$file_contents = '';
		if (count($pages)) {
			foreach($pages as $page) {
				// Escape double quotes that aren't yet escaped
				// addcslashes might actually work here too... not sure
				$page['absolute_link'] = preg_replace('/(?<!\\\)\"/', '\"', $page['absolute_link']);
				$page['class'] = preg_replace('/(?<!\\\)\"/', '\"', $page['class']);
				if (strlen($page['function'])) $file_contents.= '$route["' . $page['absolute_link'] . '"] = "' . $page['class'] . '/' . $page['function'] . '";' . "\n";
				else $file_contents.= '$route["' . $page['absolute_link'] . '"] = "' . $page['class'] . '";' . "\n";
				if ($page['class'] != 'pages') $file_contents.= '$route["' . $page['absolute_link'] . '/(.*)"] = "' . $page['class'] . '/$1";' . "\n\n";
			}
		}
		$dbr = fopen(APPPATH . 'config/routes_frontend' . EXT, 'w');
		fwrite($dbr, '<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");');
		fwrite($dbr, "\n\n");
		fwrite($dbr, $file_contents);
		fwrite($dbr, "\n\n?>");
		fclose($dbr);
	}
	function buildRoutesBackend()
	{
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('module');
		$this->db->where('isAdmin', 1);
		$query = $this->db->get();
		$pages = $query->result_array();
		$file_contents = '';
		if (count($pages)) {
			foreach($pages as $page) {
				$file_contents.= '$route["' . _ADMIN_BASE_ . '/' . $page['link_rewrite'] . '"] = "' . $page['module_class'] . '";' . "\n";
				$file_contents.= '$route["' . _ADMIN_BASE_ . '/' . $page['link_rewrite'] . '/(.*)"] = "' . $page['module_class'] . '/$1";' . "\n\n";
			}
		}
		$dbr = fopen(APPPATH . 'config/routes_backend' . EXT, 'w');
		fwrite($dbr, '<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");');
		fwrite($dbr, "\n\n");
		fwrite($dbr, $file_contents);
		fwrite($dbr, "\n\n?>");
		fclose($dbr);
	}
	function getPagesByDepth($depth)
	{
		while ($depth >= 1) {
			$this->db->flush_cache();
			$this->db->select('p.class, p.function, pt.*');
			$this->db->from('page p');
			$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
			$this->db->where('pt.depth', $depth);
			$query = $this->db->get();
			$items = $query->result_array();
			foreach($items as $item) {
				$pages[] = $item;
			}
			$depth--;
		}
		return $pages;
	}
	function _uploadImage()
	{
		$allowed = array(
			'jpeg',
			'jpg',
			'png'
		);
		$result = array();
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			if (!in_array(strtolower($extension) , $allowed)) {
				$result['error'] = array();
				$result['error'][] = "Invalid file type. '.jpg' and '.png' are allowed.";
				return $result;
			}
			if ($_FILES['file']['size'] > 1000000) {
				$result['error'] = array();
				$result['error'][] = "File size should not exceed to 50KB.";
				return $result;
			}
			$file_name = crypt(strtotime(date('Y-m-d H:i:s')) , random_string('alnum', 32)) . '.' . $extension;
			if (move_uploaded_file($_FILES['file']['tmp_name'], './upload/images/cms/' . $file_name)) {
				echo '../../upload/images/cms/' . $file_name;
				exit(0);
			}
		}
		echo 'false';
		exit(0);
	}
	function _uploadBanner()
	{
		$config['upload_path'] = './temp/images/banner/';
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['encrypt_name'] = TRUE;
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$data['error'][] = $this->upload->display_errors('', '');
			echo json_encode($data);
			exit(0);
		}
		else {
			$details = $this->upload->data();
			$data['file_name'] = $details['file_name'];
		}
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = './temp/images/banner/' . $details['file_name'];
		$config2['new_image'] = './temp/images/banner/';
		$size = getimagesize('./temp/images/banner/' . $this->upload->file_name);
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 1366;
		$config2['height'] = 1366;
		$this->load->library('image_lib', $config2);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		else {
			$data['file_name'] = $details['file_name'];
		}
		echo json_encode($data);
		exit(0);
	}
}
/* End of file Cms_model.php */
/* Location: application/modules/Cms/Cms_model.php */
?>