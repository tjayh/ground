<?php
/*
* Smarty plugin
* ————————————————————-
* File:     function.page_siblings.php
* Type:     function
* Name:     page_siblings
* Purpose:  prints out elements of an array recursively
* ————————————————————-
*/

function smarty_function_page_siblings($params, &$smarty){
	$global =& get_instance();
	$global->db->select('*');
	$global->db->from('page');
	$global->db->where('link_rewrite',$params['identifier']);
	$query = $global->db->get();
	$page = $query->row_array();	
	
	$global->db->flush_cache();
	
	$global->db->select('p.link_rewrite, p.title, pt.*');
	$global->db->from('page p');
	$global->db->join('page_tree pt','p.id = pt.id_page','left');
	$global->db->where('pt.id_parent', $page['id']);
	if ($params['not'] != '')
		$global->db->where('p.link_rewrite !=', $params['not']);
	if ($params['not_b'] != '')
		$global->db->where('p.link_rewrite !=', $params['not_b']);	
	if ($params['random'] == 'true')
		$global->db->order_by('rand()');
	$global->db->order_by('p.sort_order,title','asc');	
	if ($params['count'])
		$global->db->limit($params['count']);
	$query = $global->db->get();
	$result = $query->result_array();
	$count = count($result);
	$cnt = 1;
	if(count($result)){
		$html = '';
		foreach($result as $item){
			if($cnt == 1){
			$html .= '<li style="background: none;"><a href="'.$item['absolute_link'].'">'.$item['title'].'</a></li>';
			}
			else $html .= '<li><a href="'.$item['absolute_link'].'">'.$item['title'].'</a></li>';
			$cnt++;
		}
		$html .= '';
		return $html;
	}
	return false;
}
?>