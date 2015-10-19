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
class Search_model extends CI_Model

{
	var $trunc = 400;
	var $lead = 20;
	var $suff = "...";
	function __construct()
	{
		parent::__construct();
	}
	function logKeyword($keyword, $result)
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$data = array(
			'keyword' => strtolower($keyword) ,
			'results' => $result,
			'ip_add' => $ip,
			'date_add' => date("Y-m-d H:m:s")
		);
		$this->db->insert('vii_search_logs', $data);
	}
	function searchAdvance($finalKey)
	{
		if ($finalKey == "Search" || $finalKey == "") $finalKey = 1;
		$this->db->select('p.*,pt.*');
		$this->db->from('page p');
		$this->db->where('isAdmin', 0);
		$this->db->where('class', 'page');
		$this->db->where('link_rewrite !=', 'sitemap');
		$this->db->where('link_rewrite !=', 'page-not-found');
		$this->db->like('content', $finalKey);
		$this->db->join('page_tree pt', 'p.id_page = pt.id_page', 'left');
		$this->db->order_by("p.isAdmin", "asc");
		$this->db->order_by("pt.absolute_link", "asc");
		$this->db->order_by("p.title", "asc");
		$query = $this->db->get();
		$result = $query->result_array();
		if ($result != false) {
			$finalResult = $this->filterResult($result, $finalKey);
			return $finalResult;
		}
		else return false;
	}
	function filterResult($result, $finalKey)
	{
		$arrResult = false;
		foreach($result as $value) {
			$strippedTags = strip_tags($value["content"]);
			$pos = strripos($strippedTags, $finalKey);
			$len = strlen($finalKey);
			$pos = $pos - $this->lead;
			if ($pos > 0) {
				$pos = 0;
			}
			$rest = substr($strippedTags, $pos, $this->trunc);
			$replace = str_ireplace($finalKey, "<b>" . strtoupper($finalKey) . "</b>", $rest);
			$value["content"] = $this->suff . $replace.= $this->suff;
			$arrResult[] = $value;
		}
		return $arrResult;
	}
	function subval_sort($a, $subkey)
	{
		foreach($a as $k => $v) {
			$b[$k] = strtolower($v[$subkey]);
		}
		asort($b);
		foreach($b as $key => $val) {
			$c[] = $a[$key];
		}
		return $c;
	}
	function getStatus($ticket)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('pawn_ticket', $ticket);
		$query = $this->db->get();
		$result = $query->row_array();
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('id_customer', $result['id_customer']);
		$query2 = $this->db->get();
		$temp = $query2->row_array();
		$result['first_name'] = $temp['first_name'];
		$result['middle_name'] = $temp['middle_name'];
		$result['last_name'] = $temp['last_name'];
		$result['birth_date'] = $temp['birth_date'];
		$result['email'] = $temp['email'];
		if ($result) return $result;
		else return false;
	}
}
?>