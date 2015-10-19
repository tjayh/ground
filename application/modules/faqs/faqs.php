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
class Faqs extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('faqs_model', 'faqs');
	}
	function index()
	{
		$list = $this->faqs->_getAllItems();
		$this->template->assign('faqs', $list);
	}
}
?>