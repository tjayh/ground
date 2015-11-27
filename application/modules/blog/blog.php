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
class Blog extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model', 'blog');
	}
	function index()
	{
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->blog->_getItems();
		$length = count($list);
		$list = $this->blog->_getItems($per_page);
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('blog', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_blog = $this->blog->_getItems();
		$this->template->assign('recent_blog', $recent_blog);
	}
	function page($int_page)
	{
		if ($int_page <= 1) redirect(base_url() . 'blog/');
		$this->load->library('encrypt');
		$per_page = 5;
		$list = $this->blog->_getItems();
		$length = count($list);
		$list = $this->blog->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($list as $k => $item) {
			$src = explode(".", $item['image_src']);
			$list[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('blog', $list);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_blog = $this->blog->_getItems();
		$this->template->assign('recent_blog', $recent_blog);
	}
	function article($permalink)
	{
		$this->load->library('encrypt');
		$id_blog_item = $this->encrypt->decode(urldecode($permalink));
		$list = $this->blog->_getBlogItem($permalink);
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
		if ($list['image_src']) $this->template->assign('_meta_image', base_url() . 'upload/images/blog/' . $list['image_src']);
		$list = $this->blog->_getBlogItem();
		$id = $this->uri->segment(3);
		foreach($list as $key => $item) {
			if ($item['id_blog_item'] == $id) {
				$prev_item = $list[$key - 1];
				$next_item = $list[$key + 1];
				$prev_image_link = base_url() . 'blog/article/' . $prev_item['id_blog_item'] . '/' . $prev_item['link_rewrite'];
				$next_image_link = base_url() . 'blog/article/' . $next_item['id_blog_item'] . '/' . $next_item['link_rewrite'];
				break;
			}
		}
		if ($prev_item) $this->template->assign('prev_image_link', $prev_image_link);
		if ($next_item) $this->template->assign('next_image_link', $next_image_link);
		$recent_blog = $this->blog->_getItems(false, false, $id_blog_item);
		$this->template->assign('recent_blog', $recent_blog);
	}
}
?>