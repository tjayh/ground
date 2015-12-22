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
class Promo_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getItems($limit = false, $offset = false, $id_item = false, $id_promo_category = false)
	{
		$this->db->select('*, gc.category_title as category');
		$this->db->from('promo_item i');
		$this->db->join('promo_category gc', 'gc.id_promo_category = i.id_promo_category');
		if($id_promo_category) $this->db->where('i.id_promo_category', $id_promo_category);
		$this->db->where('i.status', 1);
		if ($id_item) {
			$this->db->where('i.id_promo_item !=', $id_item);
		}
		$this->db->order_by('i.date DESC');
		if ($limit && !$offset) {
			$this->db->limit($limit);
		}
		if ($limit && $offset) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['date'] = date('F d, Y', strtotime($item['date']));
				$item['month'] = date('F', strtotime($item['date']));
				$item['year'] = date('Y', strtotime($item['date']));
				$item['image_link'] = base_url() . 'promo/article/' . $item['id_promo_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/promo/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/promo/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getCategories($id_promo_category)
	{
		$this->db->select('gc.*');
		$this->db->from('promo_category gc');
		/* $this->db->where('gc.status', 1); */
		if ($id_promo_category) $this->db->where('gc.id_promo_category ', $id_promo_category);
		$this->db->order_by('gc.id_promo_category DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			
			foreach($result as $item) {
				$item['item_lists'] = $this->_getPromoItem(false,$item['id_promo_category']);
				$item['total_items'] = count($item['item_lists']);
				if(!$item['item_lists']){
					$item['total_items'] = 0;
				}
				$item['catagory_link'] = base_url() . 'promo/category/' . $item['id_promo_category'] . '/' . $item['category_link_rewrite'];
				if ($item['category_image_src']) {
					$item['category_image_src_thumb'] = base_url() . 'upload/images/promo/thumb/' . $item['category_image_src'];
					$item['category_image_src'] = base_url() . 'upload/images/promo/' . $item['category_image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if($id_promo_category) {
				return $return[0];
			}
			return $return;
		}
		return false;
	}
	function _getPromoItem($id_promo_item = false, $id_promo_category = false)
	{
		$this->db->select('*, gc.category_title as category');
		$this->db->from('promo_item i');
		$this->db->join('promo_category gc', 'gc.id_promo_category = i.id_promo_category', 'left');
		if($id_promo_category) {
			$this->db->where('i.id_promo_category', $id_promo_category);
		}
		$this->db->where('i.status', 1);
		if ($id_promo_item) {
			$this->db->where('i.id_promo_item', $id_promo_item);
		}
		$this->db->order_by('i.date DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['date'] = date('F d, Y', strtotime($item['date']));
				$item['month'] = date('F', strtotime($item['date']));
				$item['year'] = date('Y', strtotime($item['date']));
				$item['image_link'] = base_url() . 'promo/article/' . $item['id_promo_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/promo/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/promo/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if ($id_promo_item) {
				return $return[0];
			}
			return $return;
		}
		return false;
	}
}
?>