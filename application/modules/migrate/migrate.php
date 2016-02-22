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
class Migrate extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Migrate_model', 'blog');
	}
	function index($version)
	{
        $this->load->library('migration');
		if(!$this->migration->current()) show_error($this->migration->error_string());
		else echo '<br/>Migrations ran successfully!';
		exit(0);
    }
	function version($version)
	{
        $this->load->library('migration');
		if(!$this->migration->version($version)) show_error($this->migration->error_string());
		else echo '<br/>Migrations ran successfully!';
		exit(0);
    }
	function latest()
	{
        $this->load->library('migration');
		if(!$this->migration->latest($version)) show_error($this->migration->error_string());
		else echo '<br/>Migrations ran successfully!';
		exit(0);
    }
	
}
?>