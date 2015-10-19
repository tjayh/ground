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
class Testimonial_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getItems($limit = false, $offset = false)
	{
		$this->db->select('*');
		$this->db->from('testimonial gi');
		$this->db->where('gi.status', 1);
		$this->db->order_by('gi.id_testimonial DESC');
		if ($limit && !$offset) $this->db->limit($limit);
		if ($limit && $offset) $this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['date'] = date('F d, Y', strtotime($item['date']));
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function addItem()
	{
		$data = $this->input->post('data');
		$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
		if ($this->db->insert('testimonial', $data)) {
			return true;
		}
		else {
			return false;
		}
	}
}
?>