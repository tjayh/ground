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
class Gallery_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getItems($id = false, $id_gallery_item = false)
	{
		$this->db->select('gi.*');
		$this->db->from('gallery_item gi');
		$this->db->where('gi.status', 1);
		if ($id) $this->db->where('gi.id_gallery_category', $id);
		if ($id_gallery_item) $this->db->where('gi.id_gallery_item', $id_gallery_item);
		$this->db->order_by('gi.id_gallery_item ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_desc'] = htmlspecialchars_decode($item['image_desc']);
				$item['item_link'] = base_url() . 'gallery/view/' . $item['id_gallery_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/gallery/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/gallery/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if ($id_gallery_item) return $return[0];
			return $return;
		}
		return false;
	}
	function _getItemsCategory($id = false, $id_parent = false)
	{
		$this->db->select('gc.*');
		$this->db->from('gallery_category gc');
		$this->db->where('gc.status', 1);
		if (!$id_parent) {
			$this->db->where('gc.id_parent', 0);
		}
		if ($id) {
			$this->db->where('gc.id_gallery_category', $id);
		}
		$this->db->where('gc.id_gallery_category !=', 0);
		$this->db->order_by('gc.id_gallery_category ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['image_desc'] = htmlspecialchars_decode($item['image_desc']);
				$item['item_link'] = base_url() . 'gallery/category/' . $item['id_gallery_category'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/gallery/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/gallery/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if ($id) return $return[0];
			return $return;
		}
		return false;
	}
}
?>