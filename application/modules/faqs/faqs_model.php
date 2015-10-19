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
class Faqs_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getAllItems()
	{
		$listCategory = $this->_getItemsCategory();
		$this->db->select('i.*');
		$this->db->from('faq_item i');
		$this->db->where('i.status', 1);
		$this->db->order_by('i.faq_question ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($listCategory as $item) {
				foreach($result as $item0) {
					if ($item0['id_faq_category'] == $item['id_faq_category']) {
						$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
						$item['items'][] = $item0;
					}
				}
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getItemsCategory()
	{
		$this->db->select('c.*');
		$this->db->from('faq_category c');
		$this->db->where('c.status', 1);
		$this->db->order_by('c.id_faq_category ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
}
?>