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
class Testimonial extends MX_Controller

	{
	function __construct()
		{
		parent::__construct();
		$this->load->model('testimonial_model', 'testimonial');
		}
	function index()
		{
		$per_page = 5;
		$testimonial = $this->testimonial->_getItems();
		$length = count($testimonial);
		$testimonial = $this->testimonial->_getItems($per_page);
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('testimonial', $testimonial);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', 1);
		$this->template->assign('images_path', 'upload/images/testimonial/');
		}
	function page($int_page)
		{
		if ($int_page <= 1) redirect(base_url() . 'testimonial/');
		$per_page = 5;
		$testimonial = $this->testimonial->_getItems();
		$length = count($testimonial);
		$testimonial = $this->testimonial->_getItems($per_page, (($int_page - 1) * $per_page));
		$num_pages = (int)($length / $per_page) + (($length % $per_page) > 0 ? 1 : 0);
		$this->template->assign('testimonial', $testimonial);
		$this->template->assign('num_pages', $num_pages);
		$this->template->assign('int_page', $int_page);
		$this->template->assign('images_path', 'upload/images/testimonial/');
		}
	function process()
		{
		$action = $this->uri->segment(3);
		switch ($action)
			{
		case 'add-testi':
			$result = $this->testimonial->addItem();
			break;

		default:
			break;
			}
		if ($result) echo json_encode($result);
		  else echo 'false';
		exit(0);
		}
	}
?>