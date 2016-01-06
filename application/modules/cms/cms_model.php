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
	var $temp_file_dir = './temp/images/section/';
	var $temp_file_thumb_dir = './temp/images/section/thumb/';
	var $upload_file_dir = './upload/images/section/';
	var $upload_file_thumb_dir = './upload/images/section/thumb/';
	var $temp_dir = './temp/images/banner/';
	var $temp_thumb_dir = './temp/images/banner/thumb/';
	var $upload_dir = './upload/images/banner/';
	var $upload_thumb_dir = './upload/images/banner/thumb/';
	function __construct()
	{
		parent::__construct();
	}
	function getPages($id_page = false, $home = false)
	{
		$this->db->select('p.*,pt.*, p.class as module_name, p.function as function_name, m.id_module');
		$this->db->from('page p');
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->join('module m', ' m.module_class = p.class', 'left');
		$this->db->where('p.isAdmin', 0);
		$this->db->where('m.isActive', 1);
		if ($home) {
			$this->db->where('p.title !=', 'home');
		}
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
	function getSectionPages($id_page = false)
	{
		$this->db->select('p.*,pt.*, p.class as module_name, p.function as function_name, m.id_module');
		$this->db->from('page p');
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->join('module m', ' m.module_class = p.class', 'left');
		$this->db->where('p.isAdmin', 0);
		$this->db->where('m.isActive', 1);
		$this->db->where('p.title !=', 'home');
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
				$item['image_src'] = base_url() . 'upload/images/banner/' . $item['image_src'];
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
			$col = 0;
			while ($col != 4) {
				foreach($result['sections']['col' . $col] as $key => $item) { // get section details
					$item['key_section'] = $key;
					if ($item['content_type'] == 'module') {
						$pull_temp = 'module';
					}
					else {
						$pull_temp = 'section';
					}
					$section_layout = $this->getSectionTemplates($item['id_page_section']);
					$item['template_html'] = '/default/includes/section/' . $section_layout['file_name'];
					foreach($item['pages'] as $key2 => $item2) {
						$page_data = $this->getSectionPages($item2);
						unset($page_data['json']);
						$item['pages'][$key2] = $page_data;
					}
					$item['id_page'] = $result['id_page'];
					$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
					$return['col' . $col][] = $item;
				}
				$col++;
			}
			$result['sections'] = $return;
			return $result;
		}
		return false;
	}
	function getSectionTemplates($id_page_section = false, $type = false)
	{
		$this->db->select('ps.*, m.*');
		$this->db->from('page_section ps');
		$this->db->join('module m', 'ps.id_module = m.id_module', 'left');
		if ($id_page_section) {
			$this->db->where('ps.id_page_section', $id_page_section);
		}
		if ($type) {
			$this->db->where('ps.type', $type);
		}
		$query = $this->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		else if ($id_page_section) {
			$result = $query->row_array();
			return $result;
		}
		else {
			$result = $query->result_array();
			foreach($result as $key => $item) {
				$file_name = base_url() . 'upload/images/section/' . $item['image_src'];
				if ($item['image_src']) {
					$item['image_link'] = $file_name;
				}
				else {
					$item['image_link'] = base_url() . '/upload/images/section/default.png';
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
	}
	function getPagesTree($id_parent = 0)
	{
		$id_page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$this->db->select('p.link_rewrite, p.title, pt.absolute_link,  pt.*');
		$this->db->from('page p');
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->where('pt.id_parent', $id_parent);
		$this->db->where('p.isAdmin', 0);
		$this->db->where('p.title !=', 'home');
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
		$themes = directory_map(_SKIN_PATH_, 1);
		$templates = array();
		foreach($themes as $theme) {
			if ($theme != 'email_templates' && $theme != 'admin' && $theme != _ADMIN_THEME_) {
				$files = directory_map(_SKIN_PATH_ . $theme, 1);
				if (strpos($theme, 'vii_') !== false) {
					foreach($files as $file) {
						if (is_file(_SKIN_PATH_ . $theme . '/' . $file) && $file != 'index.html') {
							$templates[] = $theme . '/' . $file;
						}
					}
				}
			}
		}
		return $templates;
	}
	function getLayoutTemplates()
	{
		$this->load->helper('directory');
		$templates = array();
		$theme = 'default';
		$folders = directory_map(_SKIN_PATH_ . $theme, 1);
		$sub = directory_map(_SKIN_PATH_ . 'default/includes/layout_templates/', 1);
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
		$folders = directory_map(_SKIN_PATH_ . $theme, 1);
		$sub = directory_map(_SKIN_PATH_ . 'default/includes/module_templates/', 1);
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
			$data['clmn_absolute_link'] = preg_replace("/[^a-zA-Z 0-9]+/", "", $data['clmn_link_rewrite']);
			$data = str_replace("<p><br /></p>", "", $data);
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
					if (!file_exists($this->upload_dir . $data['clmn_image_src'])) {
						if (!copy($this->temp_dir . $data['clmn_image_src'], $this->upload_dir . $data['clmn_image_src'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_dir . $data["clmn_image_src"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!copy($this->temp_thumb_dir . $data['clmn_image_src'], $this->upload_thumb_dir . $data['clmn_image_src'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_thumb_dir . $data["clmn_image_src"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
					}
					if (!file_exists($this->upload_dir . $data['clmn_meta_image'])) {
						if (!is_dir($this->upload_dir)) {
							mkdir($this->upload_dir, 0777, TRUE);
						}
						if (!is_dir($this->upload_thumb_dir)) {
							mkdir($this->upload_thumb_dir, 0777, TRUE);
						}
						if (!copy($this->temp_dir . $data['clmn_meta_image'], $this->upload_dir . $data['clmn_meta_image'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_dir . $data["clmn_meta_image"])) {
							$result['error'][] = "Failed to delete image to temporary folder.";
						}
						if (!copy($this->temp_thumb_dir . $data['clmn_meta_image'], $this->upload_thumb_dir . $data['clmn_meta_image'])) {
							$result['error'][] = "Failed to copy image to active folder.";
						}
						if (!unlink($this->temp_thumb_dir . $data["clmn_meta_image"])) {
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
			$data['clmn_absolute_link'] = preg_replace("/[^a-zA-Z 0-9]+/", "", $data['clmn_link_rewrite']);
			$data = str_replace("<p><br /></p>", "", $data);
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
	function _addSectionFile()
	{
		$this->db->flush_cache();
		$data = $this->input->post('data');
		$where = $this->input->post('where');
		if (!$data['limit']) {
			$data['limit'] = 1;
		}
		substr_replace($data['fileFolderName'], '_' . $data['limit'], $pos, 0);
		$raw_file_name = explode(".", $data['fileFolderName']);
		$raw_file_name[0] = $raw_file_name[0] . '_' . $data['limit'];
		$data['file_name'] = implode(".", $raw_file_name);
		$fileFolderName = $data['fileFolderName'];
		unset($data['fileFolderName']);
		$result = $this->db->insert('page_section', $data);
		if ($result) {
			if (!file_exists($this->upload_file_dir . $data['image_src'])) {
				/* copy image file */
				if (!is_dir($this->upload_file_dir)) {
					mkdir($this->upload_file_dir, 0777, TRUE);
				}
				if (!copy($this->temp_file_dir . $data['image_src'], $this->upload_file_dir . $data['image_src'])) {
					$result['error'][] = "Failed to copy image to active folder.";
				}
				if (!unlink($this->temp_file_dir . $data["image_src"])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				if (!copy($this->temp_file_thumb_dir . $data['image_src'], $this->upload_file_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to copy image to active folder.";
				}
				if (!unlink($this->temp_file_thumb_dir . $data["image_src"])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				/* copy file */
				$upload_file_dir = './skin/default/includes/section/';
				$temp_file_dir = './temp/admin/';
				if (!is_dir($upload_file_dir)) {
					mkdir($upload_file_dir, 0777, TRUE);
				}
				if (!is_dir($temp_file_dir)) {
					mkdir($temp_file_dir, 0777, TRUE);
				}
				if (!copy($temp_file_dir . $fileFolderName, $upload_file_dir . $data['file_name'])) {
					$result['error'][] = "Failed to copy file to active folder.";
				}
				if (!unlink($temp_file_dir . $fileFolderName)) {
					$result['error'][] = "Failed to delete file to temporary folder.";
				}
			}
			$this->refreshRoutes();
			return $result;
		}
		else {
			return $result;
		}
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
				}
				$this->refreshRoutes();
				return $result;
			}
		}
	}
	function _editSectionFile()
	{
		$where = $this->input->post('where');
		$data = $this->input->post('data');
		substr_replace($data['fileFolderName'], '_' . $data['limit'], $pos, 0);
		$raw_file_name = explode(".", $data['fileFolderName']);
		$raw_file_name[0] = $raw_file_name[0] . '_' . $data['limit'];
		$data['file_name'] = implode(".", $raw_file_name);
		$fileFolderName = $data['fileFolderName'];
		unset($data['fileFolderName']);
		$this->db->where('id_page_section', $where['id_page_section']);
		$result = $this->db->update('page_section', $data);
		if ($result) {
			if (!file_exists($this->upload_file_dir . $data['image_src'])) {
				/* copy image file */
				if (!is_dir($this->upload_file_dir)) {
					mkdir($this->upload_file_dir, 0777, TRUE);
				}
				if (!copy($this->temp_file_dir . $data['image_src'], $this->upload_file_dir . $data['image_src'])) {
					$result['error'][] = "Failed to copy image to active folder.";
				}
				if (!unlink($this->temp_file_dir . $data["image_src"])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
				if (!copy($this->temp_file_thumb_dir . $data['image_src'], $this->upload_file_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to copy image to active folder.";
				}
				if (!unlink($this->temp_file_thumb_dir . $data["image_src"])) {
					$result['error'][] = "Failed to delete image to temporary folder.";
				}
			}
			$upload_file_dir = './skin/default/includes/section/';
			$temp_file_dir = './temp/admin/';
			if (!file_exists($upload_file_dir . $data['file_name'])) {
				/* copy file */
				if (!is_dir($upload_file_dir)) {
					mkdir($upload_file_dir, 0777, TRUE);
				}
				if (!is_dir($temp_file_dir)) {
					mkdir($temp_file_dir, 0777, TRUE);
				}
				if (!copy($temp_file_dir . $fileFolderName, $upload_file_dir . $data['file_name'])) {
					$result['error'][] = "Failed to copy file to active folder.";
				}
				if (!unlink($temp_file_dir . $fileFolderName)) {
					$result['error'][] = "Failed to delete file to temporary folder.";
				}
			}
			$this->refreshRoutes();
			return $result;
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
					$sections_decoded[$column][$key_section]['content_type'] = $data['content_type'];
					$sections_decoded[$column][$key_section]['id_page_section'] = $data['id_page_section'];
					$sections_decoded[$column][$key_section]['section_class'] = $data['section_class'];
					$sections_decoded[$column][$key_section]['section_title_active'] = $data['section_title_active'];
					$sections_decoded[$column][$key_section]['section_subtitle_active'] = $data['section_subtitle_active'];
					$sections_decoded[$column][$key_section]['section_class_active'] = $data['section_class_active'];
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
		$deleteid = $this->input->post('id_page');
		if ($deleteid) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$this->db->where('id_page', $deleteid);
			$to_delete = $this->db->get('page');
			$data = $to_delete->row_array();
			if (file_exists($this->upload_dir . $data['image_src'])) {
				if (!unlink($this->upload_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete image to upload folder.";
				}
				if (!unlink($this->upload_thumb_dir . $data['image_src'])) {
					$result['error'][] = "Failed to delete thumb image to upload folder.";
				}
			}
			$result = $this->dbtm->deleteItem('id_page', $deleteid, 'page_tree');
			$result = $this->dbtm->deleteItem('id_page', $deleteid, 'page');
			if ($result) {
				$this->refreshRoutes();
				return true;
			}
			else {
				$result = array();
				$result['error'] = array();
				$result['error'][] = "Failed to delete item.";
				return $result;
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
	}
	function _deleteSectionFile()
	{
		$this->db->flush_cache();
		$id_page_section = $this->input->post('id_page_section');
		$this->db->select('ps.*');
		$this->db->from('page_section ps');
		$this->db->where('id_page_section', $id_page_section);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			if (!unlink($this->upload_file_dir . $data['image_src'])) {
				$result['error'][] = "Failed to delete image to upload folder.";
			}
			if (!unlink($this->upload_file_thumb_dir . $data['image_src'])) {
				$result['error'][] = "Failed to delete thumb image to upload folder.";
			}
			$upload_file_dir = './skin/default/includes/section/';
			if (!unlink($upload_file_dir . $data['file_name'])) {
				$result['error'][] = "Failed to delete file to default includes folder.";
			}
			$this->load->model('core/dbtm_model', 'dbtm');
			$result = $this->dbtm->deleteItem('id_page_section', $id_page_section, 'page_section');
			$this->refreshRoutes();
			return $result;
		}
		else {
			$result = array();
			$result['error'] = array();
			$result['error'][] = "Failed to delete item.";
			return $result;
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
		$this->db->Å¦lush_cache();
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
		$data_upd['layout'] = json_encode($data, JSON_FORCE_OBJECT);
		$this->db->where('id_page', $id_page);
		$result = $this->db->update('page', $data_upd);
		$this->refreshRoutes();
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
			$i = 0;
			foreach($sections_decoded_base[$column] as $key => $item) {
				$return[$column][$i] = $sections_decoded_base[$column][$sec_order[$key]];
				$i = $i + 1;
			}
			$sections_encoded = json_encode($return, JSON_FORCE_OBJECT);
			$this->db->flush_cache();
			$data_upd['sections'] = $sections_encoded;
			$this->db->where('id_page', $id_page);
			$result = $this->db->update('page', $data_upd);
			$this->refreshRoutes();
			return $result;
		}
	}
	function refreshRoutes()
	{
		$this->buildRoutesFrontend();
		$this->buildRoutesBackend();
		$this->load->helper('directory');
		$cache_dirctory = directory_map(FCPATH . 'application/cache/compile', 1);
		$dest = './application/cache/compile/';
		array_map('unlink', glob($dest . "*.php"));
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
	function _uploadCMSImage()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadCMSImage();
	}
	function _uploadFile()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$temp_dir = './temp/admin/';
		$this->uploader->_uploadFile($temp_dir);
	}
	function _uploadImage($type = false)
	{
		$this->load->model('core/uploader_model', 'uploader');
		if ($type == "lay_itm") {
			$temp_dir = './temp/images/section/';
			$temp_thumb_dir = './temp/images/section/thumb/';
		}
		else {
			$temp_dir = $this->temp_dir;
			$temp_thumb_dir = $this->upload_thumb_dir;
		}
		$this->uploader->_uploadImage($temp_dir, $temp_thumb_dir, false, false, $type);
	}
	function _uploadHtmlFile($type = false)
	{
		$this->load->model('core/uploader_model', 'uploader');
		$temp_dir = './temp/admin/';
		$this->uploader->_uploadHtmlFile($temp_dir, false, false, false, $type);
	}
}
/* End of file Cms_model.php */
/* Location: application/modules/Cms/Cms_model.php */
?>