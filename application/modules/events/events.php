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
		$events = $this->events->_getItems();
		$length = count($events);
		$events = $this->events->_getItems($per_page);
		foreach($events as $k => $item) {
			$src = explode(".", $item['image_src']);
			$events[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $events);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
	}
	function page($int_page)
	{
		if ($int_page <= 1) redirect(base_url() . 'events/');
		$this->load->library('encrypt');
		$per_page = 5;
		$events = $this->events->_getItems();
		$length = count($events);
		$events = $this->events->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($events as $k => $item) {
			$src = explode(".", $item['image_src']);
			$events[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('events', $events);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_events = $this->events->_getItems();
		$this->template->assign('recent_events', $recent_events);
	}
	function view($permalink)
	{
		$this->load->library('encrypt');
		$id_events_item = $this->encrypt->decode(urldecode($permalink));
		$events = $this->events->_getEventsItem($permalink);
		if ($events) $this->template->assign('data', $events);
		else show_404();
		if ($events['image_meta_title']) $this->template->assign('_meta_title', $events['image_meta_title']);
		if ($events['image_meta_description']) $this->template->assign('_meta_description', $events['image_meta_description']);
		if ($events['image_meta_keywords']) $this->template->assign('_meta_keywords', $events['image_meta_keywords']);
		if ($events['image_src']) $this->template->assign('_meta_image', base_url() . 'upload/images/events/' . $events['image_src']);
		$events = $this->events->_getEventsItem();
		$id = $this->uri->segment(3);
		foreach($events as $key => $item) {
			if ($item['id_events_item'] == $id) {
				$prev_item = $events[$key - 1];
				$next_item = $events[$key + 1];
				$prev_image_link = base_url() . 'events/view/' . $prev_item['id_events_item'] . '/' . $prev_item['link_rewrite'];
				$next_image_link = base_url() . 'events/view/' . $next_item['id_events_item'] . '/' . $next_item['link_rewrite'];
				break;
			}
		}
		if ($prev_item) $this->template->assign('prev_image_link', $prev_image_link);
		if ($next_item) $this->template->assign('next_image_link', $next_image_link);
		$recent_events = $this->events->_getItems(false, false, $id_events_item);
		$this->template->assign('recent_events', $recent_events);
	}
}
?>