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
class Paginate_model extends MX_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}
	function paginate($data, $per_page = 20, $url = false)
	{
		$config['base_url'] = base_url() . $url;
		$config['total_rows'] = count($data);
		$config['per_page'] = $per_page;
		$this->maxsaverConfig();
		$this->pagination->initialize($config);
		$offset = $this->uri->segment($config['uri_segment'] ? $config['uri_segment'] : 3);
		$this->template->assign('pagination', $this->pagination->create_links());
		$text = 'Items ' . ($offset + 1) . ' to ' . (($offset + $per_page) < $config["total_rows"] ? ($offset + $per_page) : $config["total_rows"]) . ' of ' . $config["total_rows"] . ' total';
		$this->template->assign('pagination_text', $text);
		$data = array_splice($data, $offset, $per_page);
		return $data;
	}
	function admin_paginate($data, $per_page = 10, $url = false)
	{
		$config['base_url'] = base_url() . 'administrator/' . $url;
		$config['total_rows'] = count($data);
		$config['per_page'] = $per_page;
		$config['cur_tag_open'] = '<span class="active">';
		$config['cur_tag_close'] = '</span>';
		$config['uri_segment'] = 4;
		$config['prev_link'] = '<span class="previous-off">&laquo; Previous</span>';
		$config['next_link'] = '<span class="next">Next &raquo;</span>';
		$this->pagination->initialize($config);
		$offset = $this->uri->segment($config['uri_segment'] ? $config['uri_segment'] : 4);
		$this->template->assign('pagination', $this->pagination->create_links());
		$text = 'Items ' . ($offset + 1) . ' to ' . (($offset + $per_page) < $config["total_rows"] ? ($offset + $per_page) : $config["total_rows"]) . ' of ' . $config["total_rows"] . ' total';
		$this->template->assign('pagination_text', $text);
		$data = array_splice($data, $offset, $per_page);
		return $data;
	}
	function maxsaverConfig()
	{
		$config['full_tag_open'] = '<ol class="pagination">';
		$config['full_tag_close'] = '</ol>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	}
}
/* End of file paginate_model.php */
/* Location: ./application/modules/core/paginate_model.php */
?>