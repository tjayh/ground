<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
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
class Pages extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model', 'pages');
		$this->load->helper('string');
	}
	function index()
	{
	}
	function display()
	{
	}
	function error()
	{
	}
	/**
	 * Ajax Process
	 *
	 * @access	public
	 * @return	string/json
	 */
	function process()
	{
		$action = $this->uri->segment(3);
		switch ($action) {
		case 'save-page-content':
			$result = $this->pages->_savePageContent();
			break;

		case 'get-page-content':
			$result = $this->pages->_getPageContent();
			break;

		case 'delete':
			$result = $this->pages->_deletePage();
			break;

		default:
			break;
		}
		if ($result) echo json_encode($result);
		else echo 'false';
	}
}
/* End of file Pages.php */
/* Location: application/modules/Pages/Pages.php */
