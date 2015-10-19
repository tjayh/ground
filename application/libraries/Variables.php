<?php
class Variables{
	
	function __construct()
	{
		$global =& get_instance();
		$global->load->library('template');				
	}
	function getConfig($name){
		$global =& get_instance();
		$global->db->select('*');
		$global->db->from('config');
		$global->db->where('name',$name);
		$query = $global->db->get();
		if ($query->num_rows()){
			$result = $query->row_array();
			return $result['value'];
		}
		return false;
	}
}
?>