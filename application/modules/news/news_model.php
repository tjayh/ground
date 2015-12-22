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
class News_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getItems($limit = false, $offset = false, $id_item = false, $id_news_category = false)
	{
		$this->db->select('*, gc.category_title as category');
		$this->db->from('news_item i');
		$this->db->join('news_category gc', 'gc.id_news_category = i.id_news_category');
		if($id_news_category) $this->db->where('i.id_news_category', $id_news_category);
		$this->db->where('i.status', 1);
		if ($id_item) {
			$this->db->where('i.id_news_item !=', $id_item);
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
				$item['image_link'] = base_url() . 'news/article/' . $item['id_news_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/news/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/news/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function _getCategories($id_news_category)
	{
		$this->db->select('gc.*');
		$this->db->from('news_category gc');
		/* $this->db->where('gc.status', 1); */
		if ($id_news_category) $this->db->where('gc.id_news_category ', $id_news_category);
		$this->db->order_by('gc.id_news_category DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			
			foreach($result as $item) {
				$item['item_lists'] = $this->_getNewsItem(false,$item['id_news_category']);
				$item['total_items'] = count($item['item_lists']);
				if(!$item['item_lists']){
					$item['total_items'] = 0;
				}
				$item['catagory_link'] = base_url() . 'news/category/' . $item['id_news_category'] . '/' . $item['category_link_rewrite'];
				if ($item['category_image_src']) {
					$item['category_image_src_thumb'] = base_url() . 'upload/images/news/thumb/' . $item['category_image_src'];
					$item['category_image_src'] = base_url() . 'upload/images/news/' . $item['category_image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if($id_news_category) {
				return $return[0];
			}
			return $return;
		}
		return false;
	}
	function _getNewsItem($id_news_item = false, $id_news_category = false)
	{
		$this->db->select('*, gc.category_title as category');
		$this->db->from('news_item i');
		$this->db->join('news_category gc', 'gc.id_news_category = i.id_news_category', 'left');
		if($id_news_category) {
			$this->db->where('i.id_news_category', $id_news_category);
		}
		$this->db->where('i.status', 1);
		if ($id_news_item) {
			$this->db->where('i.id_news_item', $id_news_item);
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
				$item['image_link'] = base_url() . 'news/article/' . $item['id_news_item'] . '/' . $item['link_rewrite'];
				if ($item['image_src']) {
					$item['image_src_thumb'] = base_url() . 'upload/images/news/thumb/' . $item['image_src'];
					$item['image_src'] = base_url() . 'upload/images/news/' . $item['image_src'];
				}
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			if ($id_news_item) {
				return $return[0];
			}
			return $return;
		}
		return false;
	}
}
?>