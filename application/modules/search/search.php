<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

class Search extends MX_Controller {
	
	var $log_search_setting = true;
	
	function __construct()
	{
		parent::__construct();	
		$this->load->library('calendar');
		$this->load->library('pagination');
		$this->load->model('search_model','cmssearch');
		$this->load->helper('string');
	}
	
	function index(){
		// edit skin > search for google search
		// to set up got to https://cse.google.com/cse/manage/all 
		// Layout: Full width
		// Themes: Minimalist
		
	}

}

/* End of file generic.php */
/* Location: ./system/application/controllers/modules/generic/generic.php */