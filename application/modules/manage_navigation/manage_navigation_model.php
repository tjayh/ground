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
class Manage_navigation_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function _getNav($isActive = 1)
	{
		$this->db->select('pt.id_page, pt.id_parent, pt.isActive, p.link_rewrite, p.title');
		$this->db->from('page_tree pt');
		$this->db->join('page p', 'pt.id_page = p.id_page');
		$this->db->where('pt.isActive', $isActive);
		$this->db->order_by('p.sort_order ASC');
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		}
		else {
			return false;
		}
	}
	function _getNavHTMLInactive($menuData, $parentID = 0)
	{
		$result = null;
		foreach($menuData as $item) {
			$result.= "<li class='dd-item dd3-item' data-id='" . $item['id_page'] . "'>
					<div class='dd-handle dd3-handle'></div>
					<div class='dd3-content'>
						<span>" . $item['title'] . "</span>
						<div class='pull-right'>";
			if ($item['isActive'] == '0') {
				$result.= '<span data-rel="tooltip" data-placement="left" title="Activate/Deactivate" data="' . $item['isActive'] . '||' . $item['id_page'] . '"></span>';
			}
			else {
				$result.= '<span data-rel="tooltip" data-placement="left" title="Activate/Deactivate" data="' . $item['isActive'] . '||' . $item['id_page'] . '"></span>';
			}
			$result.= '</div></div>' . '</li>';
		}
		return $result ? '<ol class="dd-list">' . $result . '</ol>' : '<ol class="dd-list">' . '<li class="dd-item dd3-item"></li>' . '</ol>';
	}
	function _getNavHTML($menuData, $parentID = 0)
	{
		$result = null;
		foreach($menuData as $item) {
			if ($item['id_parent'] == $parentID) {
				$result.= "<li class='dd-item dd3-item' data-id='" . $item['id_page'] . "'>
					<div class='dd-handle dd3-handle'></div>
					<div class='dd3-content'>
						<span>" . $item['title'] . "</span>
						<div class='pull-right'>";
				if ($item['isActive'] == '0') {
					$result.= '<span data-rel="tooltip" data-placement="left" title="Activate/Deactivate" data="' . $item['isActive'] . '||' . $item['id_page'] . '"></span>';
				}
				else {
					$result.= '<span data-rel="tooltip" data-placement="left" title="Activate/Deactivate" data="' . $item['isActive'] . '||' . $item['id_page'] . '"></span>';
				}
				$result.= '</div></div>' . $this->_getNavHTML($menuData, $item['id_page']) . '</li>';
			}
		}
		return $result ? '<ol class="dd-list">' . $result . '</ol>' : '<ol class="dd-list">' . '<li class="dd-item dd3-item"></li>' . '</ol>';
	}
	function parseNavJsonArray($jsonArray, $parentID = 0)
	{
		$return = array();
		foreach($jsonArray as $subArray) {
			$returnSubArray = array();
			if (isset($subArray['children'])) {
				$returnSubArray = $this->parseNavJsonArray($subArray['children'], $subArray['id']);
			}
			$return[] = array(
				'id' => $subArray['id'],
				'parentID' => $parentID
			);
			$return = array_merge($return, $returnSubArray);
		}
		return $return;
	}
	function changeParentId($menuData)
	{
		foreach($menuData as $k => $v) {
			$this->db->set('sort_order', $k);
			$this->db->where('id_page', $v['id']);
			$this->db->update('page');
			$this->db->set('id_parent', $v['parentID']);
			$this->db->set('isActive', 1);
			$this->db->where('id_page', $v['id']);
			$result = $this->db->update('page_tree');
		}
		foreach($menuData as $k => $v) {
			$depth = $this->getDepth($v['parentID']);
			$this->db->set('sort_order', $k);
			$this->db->where('id_page', $v['id']);
			$this->db->update('page');
			$this->db->set('id_parent', $v['parentID']);
			$this->db->set('depth', $depth);
			$this->db->set('isActive', 1);
			$this->db->where('id_page', $v['id']);
			$result = $this->db->update('page_tree');
		}
		if ($result) {
			return true;
		}
		else {
			return false;
		}
	}
	function getDepth($id_parent)
	{
		if ($id_parent) {
			$d = $this->db->get_where('page_tree', array(
				'id_page' => $id_parent
			));
			$r = $d->row_array();
			return $r['depth'] + 1;
		}
		else {
			return 1;
		}
	}
	function changeStatus($menuData)
	{
		foreach($menuData as $k => $v) {
			$this->db->set('isActive', 0);
			$this->db->where('id_page', $v['id']);
			$result = $this->db->update('page_tree');
		}
		if ($result) {
			return true;
		}
		else {
			return false;
		}
	}
	function updateNavStatus()
	{
		$this->db->set('isActive', $this->input->post('status'));
		$this->db->where('id_page', $this->input->post('id'));
		$result = $this->db->update('page_tree');
		if ($result) {
			return true;
		}
		else {
			return false;
		}
	}
}
?>