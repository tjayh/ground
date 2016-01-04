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
class SeoManager extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$tabs = array(
			'Quick Stats' => 'index',
			// 'Settings'	=> 'settings'
		);
		$this->template->assign('tabs', $tabs);
		$this->load->model('seomanager_model', 'prime');
		$this->load->model('core/config_model', 'setting');
	}
	function index()
	{
		$this->load->library('encrypt');
		$p = '';
		if ($p) {
			print_r($this->encrypt->encode($p));
			exit;
		}
	}
	function generateStat()
	{
		$user = $this->setting->get('SERVER_USERNAME');
		$pass = $this->setting->getDecoded('SERVER_PASSWORD');
		$domain = $this->setting->get('SERVER_URL');
		if (strpos($_SERVER['QUERY_STRING'], '.png') !== false) {
			$fileQuery = $_SERVER['QUERY_STRING'];
		}
		elseif (empty($_SERVER['QUERY_STRING'])) {
			$fileQuery = "awstats.pl?config=$domain";
		}
		else {
			$fileQuery = 'awstats.pl?' . $_SERVER['QUERY_STRING'];
		}
		$file = $this->getFile($fileQuery, $user, $pass, $domain);
		if (strpos($_SERVER['QUERY_STRING'], '.png') === false) {
			$file = str_replace('awstats.pl', basename($_SERVER['PHP_SELF']) , $file);
			$file = str_replace('="/images', '="' . basename($_SERVER['PHP_SELF']) . '?images', $file);
		}
		else {
			header("Content-type: image/png");
		}
		// print_r($file);
		// $this->template->assign('stats',$file);
		return $file;
	}
	function getFile($fileQuery, $user, $pass, $domain)
	{
		return file_get_contents("http://$user:$pass@$domain:2082/" . $fileQuery);
	}
	function ndawstats()
	{
		// error_reporting(E_ALL);
		echo $this->generateStat();
	}
	function settings()
	{
		$this->load->model('settings/settings_model', 'settings');
		$fields = array(
			'site_name',
			'seo_google_ua',
			'google_cse',
			'meta_title',
			'meta_tags',
			'meta_description',
			'meta_author',
			'meta_robots'
		);
		foreach($fields as $value) {
			$item = $this->settings->get(strtoupper($value));
			$this->template->assign($value, $item);
		}
	}
	function socialmedia()
	{
		$this->load->model('settings/settings_model', 'settings');
		$this->load->helper('string');
		$this->load->library('encrypt');
		$fields = array(
			'smedia_facebook',
			'smedia_twitter',
			'smedia_googleplus',
			'smedia_instagram',
			'smedia_linkedin',
			'smedia_pinterest'
		);
		foreach($fields as $value) {
			$item = $this->settings->get(strtoupper($value));
			$this->template->assign($value, $item);
		}
	}
	function process()
	{
		$action = $this->uri->segment(4);
		switch ($action) {
		case 'save-settings':
			$result = $this->prime->saveSettings();
			break;

		default:
			break;
		}
		if ($result) {
			echo json_encode($result);
		}
		else echo 'false';
		exit(0);
	}
}
/* End of file seomanager.php */
/* Location: ./system/modules/seomanager/seomanager.php */
