<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");

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

class Rssfeed extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('xml');
		$this->load->model('rssfeed_model','rssfeed');
	}

	function index(){
	}
	function pages(){
		$data['encoding'] = 'utf-8';
        $data['page_language'] = 'en-ca';
        $posts = $this->rssfeed->getPages();
        header("Content-Type: application/rss+xml");
		$this->template->assign('posts', $posts);
		$this->template->assign('feeds', $data);
		$this->template->assign('rssfeed', 'Articles');
	}
	function news(){
		$data['encoding'] = 'utf-8';
        $data['page_language'] = 'en-ca';
        $posts = $this->rssfeed->getNews();
        header("Content-Type: application/rss+xml");
		$this->template->assign('posts', $posts);
		$this->template->assign('feeds', $data);
		$this->template->assign('rssfeed', 'News');
	}
}

?>