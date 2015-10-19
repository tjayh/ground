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
 
include_once(APPPATH.'libraries/smarty/Smarty.class.php');

class template extends Smarty{
	function __construct()
	{
		$this->compile_dir = _CACHE_FOLDER_.'compile';
		$this->template_dir = _SKIN_URL_;
		$this->plugins_dir = APPPATH.'libraries/smarty/plugins/';
		$this->error_reporting = E_ALL & ~E_NOTICE;
		log_message('debug', "Smarty Class Initialized");
	}
}
?>