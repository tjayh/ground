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
class Gallery extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model', 'gallery');
	}
	function index()
	{
		$gallery = $this->gallery->_getItemsCategory();
		$this->template->assign('gallery', $gallery);
	}
	function category()
	{
		$id = $this->uri->segment(3);
		$gallery = $this->gallery->_getItems($id);
		$category = $this->gallery->_getItemsCategory($id);
		$this->template->assign('gallery_lists', $gallery);
		$this->template->assign('gallery_category', $category);
		if ($category['category_meta_title']) $this->template->assign('_meta_title', $category['category_meta_title']);
		if ($category['category_meta_description']) $this->template->assign('_meta_description', $category['category_meta_description']);
		if ($category['category_meta_keywords']) $this->template->assign('_meta_keywords', $category['category_meta_keywords']);
		if ($category['category_src']) $this->template->assign('_meta_category', $category['category_src']);
	}
	function view()
	{
		$id = $this->uri->segment(3);
		$gallery = $this->gallery->_getItems(false, $id);
		$category = $this->gallery->_getItemsCategory($gallery['id_gallery_category']);
		$this->template->assign('data', $gallery);
		$this->template->assign('gallery_category', $category);
		if ($gallery['image_meta_title']) $this->template->assign('_meta_title', $gallery['image_meta_title']);
		if ($gallery['image_meta_description']) $this->template->assign('_meta_description', $gallery['image_meta_description']);
		if ($gallery['image_meta_keywords']) $this->template->assign('_meta_keywords', $gallery['image_meta_keywords']);
		if ($gallery['image_src']) $this->template->assign('_meta_image', $gallery['image_src']);
	}
}
?>