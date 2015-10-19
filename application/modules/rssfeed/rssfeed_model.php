<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");

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

class Rssfeed_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		
	}
	function getNews ()
	{
		$this->db->select('*');
		$this->db->from('news_item');
		$this->db->order_by('id_news_item DESC');	
		$this->db->where('status',1);
		$query = $this->db->get();
		$result = $query->result_array();
		$pages = array();
		foreach($result as $key => $item) {
			$this->db->flush_cache();
			$item['content'] =  $item['image_desc'];
			$item['title'] =  $item['image_title'];
			$item['link_rewrite'] =  'news/'.$item['id_news_item'].$item['image_title'];
			$pages[] = $item;
		}
		return $pages;
	}
	function getPages($id_page = false){
		$this->db->select('p.*,pt.*, p.class as module_name, p.function as function_name');
		$this->db->from('page p');
		$this->db->join('page_tree pt','p.id_page = pt.id_page','left');
		$this->db->where('p.isAdmin',0);
		$this->db->where('p.content !=', "");
		$this->db->where('p.link_rewrite !=', "error");
		$this->db->order_by('p.id_page DESC');	
		if($id_page){
			$this->db->where('p.id_page',$id_page);
			$query = $this->db->get();
			if(!$query->num_rows())
				return false;
			return $query->row_array();
		}		
		$this->db->order_by("pt.absolute_link", "asc");
		$this->db->order_by("p.title", "asc"); 
		$query = $this->db->get();
		if(!$query->num_rows())
			return false;
		$result = $query->result_array();
		$pages = array();
		foreach($result as $key => $item) {
			$this->db->flush_cache();
			$item['content_strip_tags'] =str_replace("<br>","",preg_replace('/<[^<]+?>/g', '', $item['content'])); 
			if($item['content'] == "<br>" || $item['content'] == ""){
				unset($result[$key]);
			}
			else{
				$pages[] = $item;
			}
			
		}
		return $pages;
	}
}

?>