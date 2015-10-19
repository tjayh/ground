<?php
/*
* Smarty plugin
* ————————————————————-
* File:     function.page_children.php
* Type:     function
* Name:     page_children
* Purpose:  prints out elements of an array recursively
* ————————————————————-
*/

function smarty_function_page_callout($params, &$smarty){
	$global =& get_instance();
	$global->db->select('*');
	$global->db->from('callout_item');
	$global->db->where('directory_type',$params['directory_type']);	
	if ($params['not'] != ''){
		//$global->db->not_like('description', $params['not'],'both');
		$global->db->not_like('title',$params['not'],'both');}
	if ($params['not_b'] != ''){
		$global->db->not_like('description', $params['not_b'],'both');
		$global->db->not_like('title',$params['not_b'],'both');}
	if ($params['random'] == 'true')
		$global->db->order_by('rand()');
	if ($params['count'])
		$global->db->limit($params['count']);
	$query = $global->db->get();
	$result = $query->result_array();
	$count = count($result);
	$cnt = 1;
	if(count($result)){
		$html = '<div class="'.$params['class'].'">';
		foreach($result as $item){			
			//$html .= $item['description'];
			$html .= str_replace('../uploads/','uploads/',$item['description']);
		}
		$html .= '</div>';
		return $html;		
	}else {
		$html = '<div class="block">';
		$html .= '<p>&nbsp;</p>';		
		$html .= '</div>';
		return $html;
	}
	return false;
}
?>