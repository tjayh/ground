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
class Cron extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('cron_model', 'cron');
	}
	function index()
	{
	}
	function clearCache()
	{
	}
	function deleteUnusedImageUpload()
	{
	}
	function deleteUnusedImageUpload()
	{
	}
}
?>