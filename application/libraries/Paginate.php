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

class paginate extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->library('pagination');
		$this->load->helper('url');
	}
	
	function set()
	{
		print_r(base_url().$this->uri->uri_string());
	}
}

/* End of file paginate_model.php */
/* Location: ./application/modules/core/paginate.php */