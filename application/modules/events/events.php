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
class Events extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('events_model', 'events');
	}
	function index()
	{
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->events->_getItems();
		$length = count($list);
		$list = $this->events->_getItems($per_page);
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
		$category_list = $this->events->_getCategories();
		$this->template->assign('category_list', $category_list);
	}
	function page($int_page)
	{
		if ($int_page <= 1) redirect(base_url() . 'events/');
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->events->_getItems();
		$length = count($list);
		$list = $this->events->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
		$category_list = $this->events->_getCategories();
		$this->template->assign('category_list', $category_list);
	}
	function view($permalink)
	{
		$this->load->library('encrypt');
		$id_events_item = $this->encrypt->decode(urldecode($permalink));
		$list = $this->events->_getEventsItem($permalink);
		if ($list) {
			$this->template->assign('data', $list);
		}
		else {
			show_404();
		}
		if ($list['image_meta_title']) $this->template->assign('_meta_title', $list['image_meta_title']);
		if ($list['image_meta_description']) $this->template->assign('_meta_description', $list['image_meta_description']);
		if ($list['image_meta_keywords']) $this->template->assign('_meta_keywords', $list['image_meta_keywords']);
		if ($list['image_meta_author']) $this->template->assign('_meta_author', $list['image_meta_author']);
		if ($list['image_src']) $this->template->assign('_meta_image', base_url() . 'upload/images/events/' . $list['image_src']);
		$list = $this->events->_getEventsItem();
		$id = $this->uri->segment(3);
		foreach($list as $key => $item) {
			if ($item['id_events_item'] == $id) {
				$prev_item = $list[$key - 1];
				$next_item = $list[$key + 1];
				$prev_image_link = base_url() . 'events/view/' . $prev_item['id_events_item'] . '/' . $prev_item['link_rewrite'];
				$next_image_link = base_url() . 'events/view/' . $next_item['id_events_item'] . '/' . $next_item['link_rewrite'];
				break;
			}
		}
		if ($prev_item) $this->template->assign('prev_image_link', $prev_image_link);
		if ($next_item) $this->template->assign('next_image_link', $next_image_link);
		$recent_events = $this->events->_getItems(false, false, $id_events_item);
		$this->template->assign('recent_events', $recent_events);
		$category_list = $this->events->_getCategories();
		$this->template->assign('category_list', $category_list);
	}
	function category()
	{
		$id_events_category = $this->uri->segment(3);
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->events->_getItems(false, false, false, $id_events_category);
		$length = count($list);
		$list = $this->events->_getItems($per_page, false, false, $id_events_category);
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
		$category = $this->events->_getCategories($id_events_category);
		$this->template->assign('category', $category);
		$category_list = $this->events->_getCategories();
		$this->template->assign('category_list', $category_list);
		if ($category['category_meta_title']) $this->template->assign('_meta_title', $category['category_meta_title']);
		if ($category['category_meta_description']) $this->template->assign('_meta_description', $category['category_meta_description']);
		if ($category['category_meta_keywords']) $this->template->assign('_meta_keywords', $category['category_meta_keywords']);
		if ($category['category_meta_author']) $this->template->assign('_meta_author', $category['category_meta_author']);
	}
	function category_page($int_page)
	{
		$id_events_category = $this->uri->segment(4);
		if ($int_page <= 1) {
			redirect(base_url() . 'events/category/' . $id_events_category);
		}
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->events->_getItems(false, false, false, $id_events_category);
		$length = count($list);
		$list = $this->events->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
		$category = $this->events->_getCategories($id_events_category);
		$this->template->assign('category', $category);
		$category_list = $this->events->_getCategories();
		$this->template->assign('category_list', $category_list);
		if ($category['category_meta_title']) $this->template->assign('_meta_title', $category['category_meta_title']);
		if ($category['category_meta_description']) $this->template->assign('_meta_description', $category['category_meta_description']);
		if ($category['category_meta_keywords']) $this->template->assign('_meta_keywords', $category['category_meta_keywords']);
		if ($category['category_meta_author']) $this->template->assign('_meta_author', $category['category_meta_author']);
	}
}
?>