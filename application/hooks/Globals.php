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
class Globals

{
	var $CI;
	var $module;
	var $method;
	function __construct()
	{
		$this->CI = & get_instance();
		$this->module = CI::$APP->router->fetch_module();
		$this->method = CI::$APP->router->fetch_method();
		$this->upload_images = base_url() . 'upload/images/';
		$this->CI->load->library('template');
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
	}
	function checkPermission()
	{
		if ($this->checkIfAdminModule() && !$this->CI->session->userdata('adminLogged') && $this->method != 'login') {
			$this->CI->session->set_userdata('redirect', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			redirect(base_url() . _ADMIN_BASE_ . '/login');
		}
	}
	function assign()
	{
		if ($this->checkIfAdminModule()) {
			if (file_exists(_SKIN_PATH_ . _ADMIN_THEME_ . '/modules/' . $this->module . '/' . $this->method . '.html')) $this->CI->template->assign('_template', _SKIN_PATH_ . _ADMIN_THEME_ . '/modules/' . $this->module . '/' . $this->method . '.html');
		}
		else {
			if (file_exists(_SKIN_PATH_ . _THEME_ . '/modules/' . $this->module . '/' . $this->method . '.html')) {
				$this->CI->template->assign('_template', _THEME_ . '/modules/' . $this->module . '/' . $this->method . '.html');
			}
			else if (file_exists(_SKIN_PATH_ . 'default' . '/modules/' . $this->module . '/' . $this->method . '.html')) {
				$this->CI->template->assign('_template', 'default' . '/modules/' . $this->module . '/' . $this->method . '.html');
			}
		}
	}
	/**
	 * Set Global variables accross all pages
	 *
	 * Set global variable accross all pages
	 * mostly used for setting header content and
	 * variables that is used anywhere in the site
	 *
	 * @access	public
	 * @param	none
	 * @return	void
	 */
	function variables()
	{
		$this->CI->template->assign('base_url', _BASE_URL_);
		$this->CI->template->assign('admin_base', _BASE_URL_ . _ADMIN_BASE_ . '/');
		$this->CI->template->assign('base_theme_url', _BASE_URL_ . 'skin/' . _THEME_ . '/');
		$this->CI->template->assign('admin_theme_url', _BASE_URL_ . 'skin/' . _ADMIN_THEME_ . '/');
		$this->CI->template->assign('admin_theme', _ADMIN_THEME_);
		$this->CI->template->assign('_theme', _THEME_);
		$this->CI->template->assign('_site_title', $this->getConfig('SITE_NAME'));
		$this->CI->template->assign('_theme_css', $this->getConfig('THEME_CSS'));
		$this->CI->template->assign('_site_css', $this->getConfig('SITE_CSS'));
		$this->CI->template->assign('_meta_keywords', $this->getConfig('META_TAGS'));
		$this->CI->template->assign('_meta_title', $this->getConfig('META_TITLE'));
		$this->CI->template->assign('_meta_description', $this->getConfig('META_DESCRIPTION'));
		$this->CI->template->assign('_meta_author', $this->getConfig('META_AUTHOR'));
		$this->CI->template->assign('_meta_robots', $this->getConfig('META_ROBOTS'));
		$this->CI->template->assign('_google_ua', $this->getConfig('SEO_GOOGLE_UA'));
		$this->CI->template->assign('_logo', $this->upload_images . 'logo/' . $this->getConfig('SITE_LOGO'));
		$this->CI->template->assign('_favicon', $this->upload_images . 'favicon/' . $this->getConfig('SITE_FAVICON'));
		$this->CI->template->assign('_site_backgrounds', $this->getConfig('SITE_BACKGROUNDS'));
		$this->CI->template->assign('_sm_facebook', $this->getConfig('SMEDIA_FACEBOOK'));
		$this->CI->template->assign('_sm_twitter', $this->getConfig('SMEDIA_TWITTER'));
		$this->CI->template->assign('_sm_googleplus', $this->getConfig('SMEDIA_GOOGLEPLUS'));
		$this->CI->template->assign('_sm_pinterest', $this->getConfig('SMEDIA_PINTEREST'));
		$this->CI->template->assign('_sm_linkedin', $this->getConfig('SMEDIA_LINKEDIN'));
		$this->CI->template->assign('_sm_instagram', $this->getConfig('SMEDIA_INSTAGRAM'));
		$this->CI->template->assign('_contact_email', $this->getConfig('CONTACT_EMAIL'));
		$this->CI->template->assign('_contact_no', $this->getConfig('CONTACT_NO'));
		$this->CI->template->assign('_contact_address', $this->getConfig('CONTACT_ADDRESS'));
		$this->CI->template->assign('_recaptcha_public_key', $this->getConfig('RECAPTCHA_PUBLIC_KEY'));
		$this->CI->template->assign('_banner', $this->getBanners());
		$this->CI->template->assign('_news', $this->getItems_news());
		$this->CI->template->assign('_events', $this->getItems_events());
		$this->CI->template->assign('_promo', $this->getItems_promo());
		$this->CI->template->assign('_blog', $this->getItems_blog());
		$this->CI->template->assign('_gallery', $this->getCategory_gallery());
		$this->CI->template->assign('_testimonials', $this->getItems_testimonials());
		$this->CI->template->assign('_faqs', $this->getItems_faqs());
		$this->CI->template->assign('_style', $this->getConfigStyle());
		$this->CI->template->assign('thisModule', $this->module);
		$this->CI->template->assign('navItems', $this->_getNav());
		/* print_r($this->_getNav());exit; */
		$_cms_pages = $this->getPages();
		foreach($_cms_pages as $item) {
			$this->CI->template->assign('_page_' . $item['absolute_link'], $item['content']);
		}
		if ($this->CI->session->userdata('adminLogged')) {
			$this->CI->template->assign('_admin', $this->CI->session->userdata('adminData'));
			$this->CI->template->assign('_modules', $this->getAdminModules());
			$this->CI->template->assign('_curr_module', $this->getAdminModules($this->module));
			$this->CI->template->assign('_curr_method', $this->method);
			$this->CI->template->assign('_breadcrumbs', $this->getActiveMenu('bc_admin'));
			foreach($this->getAdminModules() as $item) {
				$html_id = $item['html_id'];
				$this->CI->template->assign($html_id, true);
			}
		}
	}
	function getCurrentPage()
	{
		$total_segment = $this->CI->uri->total_segments();
		$uri = '';
		$routes = CI::$APP->router->routes;
		for ($i = 1; $i <= $total_segment; $i++) {
			if (strlen($uri)) {
				if (array_key_exists($uri . '/' . $this->CI->uri->segment($i) , $routes)) {
					$uri.= '/' . $this->CI->uri->segment($i);
				}
				else {
					break;
				}
			}
			else {
				if (array_key_exists($uri . $this->CI->uri->segment($i) , $routes)) {
					$uri.= $this->CI->uri->segment($i);
				}
				else {
					redirect(base_url() . 'error');
					break;
				}
			}
		}
		$this->CI->db->select('p.*,pt.*,m.isActive as module_isActive');
		$this->CI->db->from('page p');
		$this->CI->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->CI->db->join('module m', 'p.class = m.module_class', 'left');
		$this->CI->db->where('pt.absolute_link', $uri);
		$query = $this->CI->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		else {
			$result = $query->row_array();
			if ($result['module_isActive'] == 1) {
				$result = $query->row_array();
				$return = array();
				$sections_decoded = json_decode($result['sections'], JSON_FORCE_OBJECT);
				$layout_decoded = json_decode($result['layout'], JSON_FORCE_OBJECT);
				$result['image_src'] = base_url() . 'upload/images/banner/' . $result['image_src'];
				$result['sections'] = $sections_decoded;
				$result['layout'] = $layout_decoded;
				$result['layout']['html_file'] = '/default/includes/layout_templates/' . $result['layout']['filename'] . '.html';
				$col = 0;
				while ($col != 4) {
					foreach($result['sections']['col' . $col] as $key => $item) { // get section details
						if (!$item['section_title_active']) {
							unset($item['section_title']);
						}
						if (!$item['section_subtitle_active']) {
							unset($item['section_subtitle']);
						}
						if (!$item['section_class_active']) {
							unset($item['section_class']);
						}
						$item['key_section'] = $key;
						$section_layout = $this->getSectionLayout($item['id_page_section']);
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
				/* print_r($result);exit; */
				return $result;
			}
			else {
				redirect(base_url() . 'error');
			}
		}
	}
	function getSectionLayout($id_page = false)
	{
		$this->CI->db->select('*');
		$this->CI->db->from('page_section');
		$this->CI->db->where('id_page_section', $id_page);
		$query = $this->CI->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		else {
			$result = $query->row_array();
			return $result;
		}
	}
	function getSectionPages($id_page = false)
	{
		$this->CI->db->select('p.*,pt.*, p.class as module_name, p.function as function_name, m.id_module');
		$this->CI->db->from('page p');
		$this->CI->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->CI->db->join('module m', ' m.module_class = p.class', 'left');
		$this->CI->db->where('p.isAdmin', 0);
		$this->CI->db->where('m.isActive', 1);
		$this->CI->db->where('p.title !=', 'home');
		if ($id_page) {
			$this->CI->db->where('p.id_page', $id_page);
		}
		$this->CI->db->order_by("pt.absolute_link", "asc");
		$this->CI->db->order_by("p.title", "asc");
		$query = $this->CI->db->get();
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
	function getPages()
	{
		$this->CI->db->select('id_page,title,content,image_src,caption,link_rewrite,absolute_link');
		$this->CI->db->from('page p');
		$this->CI->db->where('p.isAdmin', '0');
		$query = $this->CI->db->get();
		if (!$query->num_rows()) return false;
		$result = $query->result_array();
		foreach($result as $item) {
			if ($item['image_src']) {
				$item['image_src'] = base_url() . 'upload/images/banner/' . $item['image_src'];
			}
			$return[] = $item;
		}
		return $return;
	}
	function display()
	{
		$curr_page = $this->getCurrentPage();
		if ($curr_page) {
			$this->CI->template->assign('_page_curr_page', $curr_page);
			$this->CI->template->assign('_page_title', strlen($curr_page['title']) ? $curr_page['title'] : '');
			if ($this->module != 'news' && $this->module != 'blog' && $this->module != 'promo' && $this->module != 'events' && $this->module != 'gallery') {
				$this->CI->template->assign('_meta_title', strlen($curr_page['meta_title']) ? $curr_page['meta_title'] : $this->getConfig('META_TITLE'));
				$this->CI->template->assign('_meta_keywords', strlen($curr_page['meta_keywords']) ? $curr_page['meta_keywords'] : $this->getConfig('META_TAGS'));
				$this->CI->template->assign('_meta_description', strlen($curr_page['meta_description']) ? $curr_page['meta_description'] : $this->getConfig('META_DESCRIPTION'));
				$this->CI->template->assign('_meta_image', strlen($curr_page['meta_image']) ? $this->upload_images . 'banner/' . $curr_page['meta_image'] : $this->upload_images . 'banner/' . $this->getConfig('META_IMAGE'));
			}
			$this->CI->template->assign('_content', 'default' . '/modules/pages/_content.html');
			$this->CI->template->assign('_page', $curr_page);
			$this->CI->template->assign('_module', $this->module);
			$this->CI->template->assign('_linkrewrite', $curr_page['link_rewrite']);
			$this->CI->template->assign('_parent', $this->CI->uri->segment(2));
		}
		if ($this->CI->session->userdata('redirect')) {
			$this->CI->template->assign('redirect', $this->CI->session->userdata('redirect'));
			$this->CI->session->unset_userdata('redirect');
		}
		$template = $this->_getLayout($this->module, $this->method);
		if ($this->module == 'admindashboard' && $this->method == 'login') $this->CI->template->display(_SKIN_PATH_ . _ADMIN_THEME_ . '/login.template.html');
		else {
			if ($this->checkIfAdminModule()) {
				if (substr($this->method, 0, 2) != 'nd') $this->CI->template->display(_SKIN_PATH_ . _ADMIN_THEME_ . '/admin.template.html');
			}
			else {
				if (substr($this->method, 0, 2) != 'nd' && $this->method != 'process') {
					if (strlen($curr_page['custom_theme']) && strlen($curr_page['custom_layout'])) {
						$this->CI->template->display((strlen($curr_page['custom_theme']) ? $curr_page['custom_theme'] : _THEME_) . '/' . (strlen($curr_page['custom_layout']) ? $curr_page['custom_layout'] : 'main.template.html'));
					}
					elseif (!strlen($curr_page['custom_layout']) && $template) {
						echo 'aaaaaaaaaa globals.php';
						exit;
						$this->CI->template->display(_THEME_ . '/' . $template);
					}
					else {
						echo 'bbbbbbbbbb globals.php';
						exit;
						$this->CI->template->display(_THEME_ . '/main.template.html');
					}
				}
			}
		}
	}
	function _getLayout($module, $method, $get = 'template')
	{
		require_once (APPPATH . 'libraries/Simplexml.php');

		$xml = new Simplexml;
		if (file_exists(_SKIN_PATH_ . _THEME_ . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . $module . '.xml')) {
			$content = $xml->xml_parse(file_get_contents(_SKIN_PATH_ . _THEME_ . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . $module . '.xml'));
			if (!is_array($content)) {
				return false;
			}
			switch ($get) {
			case 'template':
				if ($content[$this->module . '_' . $this->method]['template']) {
					return $content[$module . '_' . $method]['template'];
				}
				elseif ($content['default']['template']) {
					return $content['default']['template'];
				}
				else {
					return false;
				}
				break;

			default:
				return false;
				break;
			}
		}
		else {
			return false;
		}
	}
	function checkIfAdminModule()
	{
		$this->CI->db->select('*');
		$this->CI->db->from('module');
		$this->CI->db->where('module_class', $this->module);
		$this->CI->db->where('isAdmin', 1);
		$query = $this->CI->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		return true;
	}
	function _getNav()
	{
		$this->CI->db->select('pt.id_page, pt.depth, pt.absolute_link, pt.id_parent, p.class, p.link_rewrite, p.title, p.redirect,m.link_rewrite,m.isActive,m.isAdmin');
		$this->CI->db->from('page_tree pt');
		$this->CI->db->join('page p', 'pt.id_page = p.id_page');
		$this->CI->db->join('module m', 'p.link_rewrite = m.link_rewrite AND m.isActive = 1 AND m.isAdmin = 0', 'left');
		$this->CI->db->where('pt.isActive', '1');
		$this->CI->db->order_by('p.sort_order ASC,pt.depth DESC');
		$query = $this->CI->db->get();
		$result_array = $query->result_array();
		$temp_array = array();
		$max_depth = 0;
		foreach($result_array as $key => $nav_item) {
			if ($nav_item['class'] != 'pages') {
				$nav_item['page_link'] = base_url() . $nav_item['link_rewrite'];
			}
			else {
				if ($nav_item['absolute_link']) {
					$pages = 'pages/';
				}
				$nav_item['page_link'] = base_url() . $pages . $nav_item['absolute_link'];
			}
			if ($nav_item['isActive'] === 0 && $nav_item['class'] != 'pages') {
				unset($nav_item[$key]);
			}
			else {
				$temp_array[$nav_item['id_page']] = $nav_item;
				$temp_array[$nav_item['id_page']]['child'] = array();
				if ($max_depth < $nav_item['depth']) {
					$max_depth = $nav_item['depth'];
				}
			}
		}
		for ($d = $max_depth; $d > 1; $d--) {
			foreach($temp_array as $nav_item) {
				if ($nav_item['id_parent'] > 0 && $nav_item['depth'] == $d) {
					$temp_array[$nav_item['id_parent']]['child'][] = $temp_array[$nav_item['id_page']];
				}
			}
		}
		foreach($temp_array as $k => $nav_item) {
			if ($nav_item['id_parent'] > 0) {
				unset($temp_array[$k]);
			}
		}
		if ($query->num_rows() != 0) {
			return $temp_array;
		}
		else {
			return false;
		}
	}
	function getActiveMenu($table)
	{
		$this->CI->db->select('id_' . $table . ', name, html_id, parent_id');
		$this->CI->db->from($table);
		$this->CI->db->where('module', $this->module);
		$this->CI->db->where('method', $this->method);
		$query = $this->CI->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		else {
			$result = $query->row_array();
			$breadcrumbs = array();
			$breadcrumbs['bcActive'] = $result['html_id'];
			if (true) {
				$breadcrumbs['bcPathMenu'] = array();
				$breadcrumbs['bcPathMenu'][] = $result;
				$flag = true;
				while ($flag) {
					$this->CI->db->select('id_' . $table . ', name, html_id, parent_id');
					$this->CI->db->from($table);
					$this->CI->db->where('id_' . $table, $result['parent_id']);
					$query = $this->CI->db->get();
					if (!$query->num_rows()) {
						$flag = false;
					}
					else {
						$result = $query->row_array();
						unset($result['id_' . $table]);
						$breadcrumbs['bcPathMenu'][] = $result;
					}
				}
				$breadcrumbs['bcPathMenu'] = array_reverse($breadcrumbs['bcPathMenu']);
			}
			return $breadcrumbs;
		}
	}
	function getBanners()
	{
		$this->CI->db->select('b.*');
		$this->CI->db->from('banner b');
		$this->CI->db->where('b.status', 1);
		$this->CI->db->order_by('b.id_banner', 'ASC');
		$query = $this->CI->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_src'] = $this->upload_images . 'banner/' . $item['image_src'];
				$item['image_src2'] = $this->upload_images . 'banner/' . $item['image_src2'];
				$return[] = $item;
			}
			return $return;
		}
	}
	function getItems_news()
	{
		$this->CI->db->select('i.id_news_item,i.date ,i.image_title ,i.image_sub_title ,i.image_desc ,i.image_src ,i.status ,i.id_news_category, i.date_add, i.link_rewrite, c.*');
		$this->CI->db->from('news_item i');
		$this->CI->db->join('news_category c', 'c.id_news_category = i.id_news_category');
		$this->CI->db->where('i.status', 1);
		$this->CI->db->order_by('i.date DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'news/article/' . $item['id_news_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'news/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'news/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getItems_events()
	{
		$this->CI->db->select('i.id_events_item,i.date ,i.image_title ,i.image_sub_title ,i.image_desc ,i.image_src ,i.status ,i.id_events_category, i.date_add, i.link_rewrite , c.*');
		$this->CI->db->from('events_item i');
		$this->CI->db->join('events_category c', 'c.id_events_category = i.id_events_category');
		$this->CI->db->where('i.status', 1);
		$this->CI->db->order_by('i.date DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'events/view/' . $item['id_events_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'events/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'events/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getItems_blog()
	{
		$this->CI->db->select('i.id_blog_item,i.date ,i.image_title ,i.image_sub_title ,i.image_desc ,i.image_src ,i.status ,i.id_blog_category, i.date_add ,i.link_rewrite , c.*');
		$this->CI->db->from('blog_item i');
		$this->CI->db->join('blog_category c', 'c.id_blog_category = i.id_blog_category');
		$this->CI->db->where('i.status', 1);
		$this->CI->db->order_by('i.date DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'blog/article/' . $item['id_blog_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'blog/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'blog/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getItems_promo()
	{
		$this->CI->db->select('i.id_promo_item,i.date ,i.image_title ,i.image_sub_title ,i.image_desc ,i.image_src ,i.status ,i.id_promo_category, i.date_add,i.link_rewrite , c.*');
		$this->CI->db->from('promo_item i');
		$this->CI->db->join('promo_category c', 'c.id_promo_category = i.id_promo_category');
		$this->CI->db->where('i.status', 1);
		$this->CI->db->order_by('i.date DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'promo/view/' . $item['id_promo_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'promo/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'promo/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getItems_faqs()
	{
		$listCategory = $this->_getItemsCategory();
		$this->CI->db->select('i.*');
		$this->CI->db->from('faq_item i');
		$this->CI->db->where('i.status', 1);
		$this->CI->db->order_by('i.faq_question ASC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($listCategory as $item) {
				foreach($result as $item0) {
					if ($item0['id_faq_category'] == $item['id_faq_category']) {
						$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
						$item['items'][] = $item0;
					}
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getItemsCategory()
	{
		$this->CI->db->select('c.*');
		$this->CI->db->from('faq_category c');
		$this->CI->db->where('c.status', 1);
		$this->CI->db->order_by('c.id_faq_category ASC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getItems_testimonials()
	{
		$this->CI->db->select('t.*');
		$this->CI->db->from('testimonial t');
		$this->CI->db->where('t.status', 1);
		$this->CI->db->order_by('t.date_add DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		}
		return false;
	}
	function getItems_gallery()
	{
		$this->CI->db->select('g.*');
		$this->CI->db->from('gallery_item g');
		$this->CI->db->where('g.status', 1);
		$this->CI->db->where('g.id_gallery_category', 1);
		$this->CI->db->order_by('g.id_gallery_item DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'gallery/view/' . $item['id_gallery_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'gallery/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'gallery/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getCategory_gallery()
	{
		$this->CI->db->select('gc.*');
		$this->CI->db->from('gallery_category gc');
		$this->CI->db->where('gc.status', 1);
		$this->CI->db->where('gc.id_gallery_category !=', 1);
		$this->CI->db->order_by('gc.id_gallery_category DESC');
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_link'] = base_url() . 'gallery/category/' . $item['id_gallery_category'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = $this->upload_images . 'gallery/thumb/' . $item['image_src'];
					$item['image_src'] = $this->upload_images . 'gallery/' . $item['image_src'];
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getAdminModules($module_class = false)
	{
		$adminData = $this->CI->session->userdata('adminData');
		$this->CI->db->select('m.*,bc.module,bc.html_id');
		$this->CI->db->from('admin_permission ap');
		$this->CI->db->join('module m', 'ap.id_module = m.id_module', 'left');
		$this->CI->db->join('bc_admin bc', 'm.module_class = bc.module', 'left');
		$this->CI->db->where('ap.id_admin_group', $adminData['id_admin_group']);
		$this->CI->db->where('m.isActive', 1);
		$this->CI->db->where('ap.isActive', 1);
		$this->CI->db->distinct();
		if ($module_class) {
			$this->CI->db->where('m.module_class', $module_class);
			$query = $this->CI->db->get();
			if (!$query->num_rows()) {
				return false;
			}
			return $query->row_array();
		}
		$this->CI->db->order_by('ap.sort_order', 'ASC');
		$query = $this->CI->db->get();
		if (!$query->num_rows()) return false;
		return $query->result_array();
	}
	function getConfig($name)
	{
		$query = $this->CI->db->get_where($this->CI->db->dbprefix('config') , array(
			'name' => $name
		) , 1);
		if ($query->num_rows() == 0) {
			return false;
		}
		$row = $query->row_array();
		return $row['value'];
	}
	function getConfigStyle()
	{
		$this->CI->db->select('cs.*');
		$this->CI->db->from('config_style cs');
		$this->CI->db->where('cs.id_config_style', 1);
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		}
		return false;
	}
}
/* End of file Globals.php */
/* Location: ./application/hooks/Globals.php */
?>