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
class News extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model', 'news');
	}
	function index()
	{
		$this->load->library('encrypt');
		$per_page = 5;
		$news = $this->news->_getItems();
		$length = count($news);
		$news = $this->news->_getItems($per_page);
		foreach($news as $k => $item) {
			$src = explode(".", $item['image_src']);
			$news[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('news', $news);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_news = $this->news->_getItems();
		$this->template->assign('recent_news', $recent_news);
	}
	function page($int_page)
	{
		if ($int_page <= 1) redirect(base_url() . 'news/');
		$this->load->library('encrypt');
		$per_page = 5;
		$news = $this->news->_getItems();
		$length = count($news);
		$news = $this->news->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($news as $k => $item) {
			$src = explode(".", $item['image_src']);
			$news[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('news', $news);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_news = $this->news->_getItems();
		$this->template->assign('recent_news', $recent_news);
	}
	function article($permalink)
	{
		$this->load->library('encrypt');
		$id_news_item = $this->encrypt->decode(urldecode($permalink));
		$news = $this->news->_getNewsItem($permalink);
		if ($news) $this->template->assign('data', $news);
		else show_404();
		if ($news['image_meta_title']) $this->template->assign('_meta_title', $news['image_meta_title']);
		if ($news['image_meta_description']) $this->template->assign('_meta_description', $news['image_meta_description']);
		if ($news['image_meta_keywords']) $this->template->assign('_meta_keywords', $news['image_meta_keywords']);
		if ($news['image_src']) $this->template->assign('_meta_image', base_url() . 'upload/images/news/' . $news['image_src']);
		$news = $this->news->_getNewsItem();
		$id = $this->uri->segment(3);
		foreach($news as $key => $item) {
			if ($item['id_news_item'] == $id) {
				$prev_item = $news[$key - 1];
				$next_item = $news[$key + 1];
				$prev_image_link = base_url() . 'news/article/' . $prev_item['id_news_item'] . '/' . $prev_item['link_rewrite'];
				$next_image_link = base_url() . 'news/article/' . $next_item['id_news_item'] . '/' . $next_item['link_rewrite'];
				break;
			}
		}
		if ($prev_item) $this->template->assign('prev_image_link', $prev_image_link);
		if ($next_item) $this->template->assign('next_image_link', $next_image_link);
		$recent_news = $this->news->_getItems(false, false, $id_news_item);
		$this->template->assign('recent_news', $recent_news);
	}
}
?>