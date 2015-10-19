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
class notificationmanager_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('csv');
	}
	function getNotification($id = false, $filter = false)
	{
		$this->db->select('*');
		$this->db->from('notification');
		if ($id) {
			$this->db->where('id_notification', $id);
			$query = $this->db->get();
			if (!$query->num_rows()) return false;
			return $query->row_array();
		}
		if ($filter == 'new') {
			$this->db->limit(5);
		}
		$this->db->order_by('date_add', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				// $item['referrer_name'] = $this->getReferrerName($item['id_referrer']);
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
}
/* End of file recruitmentmanager_model.php */
/* Location: ./application/modules/recruitmentmanager/recruitmentmanager_model.php */
