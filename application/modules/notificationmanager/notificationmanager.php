<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
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
class notificationmanager extends MX_Controller

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
		$tabs = array(
			'Index' => 'index',
			// 'Top Referrers'	=> 'top'
			'Settings' => 'settings'
		);
		$this->template->assign('tabs', $tabs);
		$this->load->model('notificationmanager_model', 'notificationmanager');
		$this->load->model('core/paginate_model', 'paginate');
		$this->load->model('core/config_model', 'settings');
	}
	function index()
	{
		$notification = $this->notificationmanager->getNotification();
		$this->template->assign('notification', $notification);
		// $this->template->assign('members',$this->paginate->admin_paginate($members,'10','members/index/'));
	}
}
/* End of file eventsmanager.php */
/* Location: ./application/modules/newsmanager/newsmanager.php */
