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
class Newsletter extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('newsletter_model', 'newsletter');
	}
	function index()
	{
		// echo 'Hello this is a new module';
	}
	function process()
	{
		$action = $this->uri->segment(3);
		switch ($action) {
		case 'add-new':
			$result = $this->newsletter->addNewSubscriber();
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