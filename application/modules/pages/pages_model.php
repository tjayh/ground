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
class Pages_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _savePageContent()
	{
		$where['id_page'] = $this->input->post('id_page');
		$update['content'] = $this->input->post('content');
		if ($this->db->update('page', $update, $where)) {
			$query = $this->db->get_where('page', $where);
			if ($query->num_rows()) return $query->row_array();
			return false;
		}
		return false;
	}
	function _getPageContent()
	{
		$where['id_page'] = $this->input->post('id_page');
		$query = $this->db->get_where('page', $where);
		if ($query->num_rows()) return $query->row_array();
		return false;
	}
}
/* End of file pages_model.php */
/* Location: ./application/modules/Pages/Pages_model.php */
