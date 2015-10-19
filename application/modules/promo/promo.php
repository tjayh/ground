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
class Promo extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('promo_model', 'promo');
	}
	function index()
	{
		$this->load->library('encrypt');
		$per_page = 5;
		$promo = $this->promo->_getItems();
		$length = count($promo);
		$promo = $this->promo->_getItems($per_page);
		foreach($promo as $k => $item) {
			$src = explode(".", $item['image_src']);
			$promo[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('promo', $promo);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$recent_promo = $this->promo->_getItems();
		$this->template->assign('recent_promo', $recent_promo);
	}
	function page($int_page)
	{
		if ($int_page <= 1) redirect(base_url() . 'promo/');
		$this->load->library('encrypt');
		$per_page = 5;
		$promo = $this->promo->_getItems();
		$length = count($promo);
		$promo = $this->promo->_getItems($per_page, (($int_page - 1) * $per_page));
		foreach($promo as $k => $item) {
			$src = explode(".", $item['image_src']);
			$promo[$k]['permalink'] = urlencode($src[0]);
		}
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('promo', $promo);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$recent_promo = $this->promo->_getItems();
		$this->template->assign('recent_promo', $recent_promo);
	}
	function view($permalink)
	{
		$this->load->library('encrypt');
		$id_promo_item = $this->encrypt->decode(urldecode($permalink));
		$promo = $this->promo->_getPromoItem($permalink);
		if ($promo) $this->template->assign('data', $promo);
		else show_404();
		if ($promo['image_meta_title']) $this->template->assign('_meta_title', $promo['image_meta_title']);
		if ($promo['image_meta_description']) $this->template->assign('_meta_description', $promo['image_meta_description']);
		if ($promo['image_meta_keywords']) $this->template->assign('_meta_keywords', $promo['image_meta_keywords']);
		if ($promo['image_src']) $this->template->assign('_meta_image', base_url() . 'upload/images/promo/' . $promo['image_src']);
		$promo = $this->promo->_getPromoItem();
		$id = $this->uri->segment(3);
		foreach($promo as $key => $item) {
			if ($item['id_promo_item'] == $id) {
				$prev_item = $promo[$key - 1];
				$next_item = $promo[$key + 1];
				$prev_image_link = base_url() . 'promo/view/' . $prev_item['id_promo_item'] . '/' . $prev_item['link_rewrite'];
				$next_image_link = base_url() . 'promo/view/' . $next_item['id_promo_item'] . '/' . $next_item['link_rewrite'];
				break;
			}
		}
		if ($prev_item) $this->template->assign('prev_image_link', $prev_image_link);
		if ($next_item) $this->template->assign('next_image_link', $next_image_link);
		$recent_promo = $this->promo->_getItems(false, false, $id_promo_item);
		$this->template->assign('recent_promo', $recent_promo);
	}
}
?>