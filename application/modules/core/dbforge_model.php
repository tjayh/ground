<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 
class Dbforge_model extends CI_Model
{
    function __construct()
    {
       parent::__construct();
	   $this->load->dbforge();
	}
	
	function createTable($data){
		
	}
	
	function createFields($data){
		$this->dbforge->add_field($data['fields']);
		$this->dbforge->add_key($data['primary_key'],TRUE);
		$this->dbforge->create_table($data['table'],TRUE);
		// return $this->dbforge->add_column($data['table'], $data['fields']) ? "1" : "2";
	}
	
	function modTableFields($data){
	
	}
	
	function dropTable($data){
		return $this->dbforge->drop_table($data['table']) ? "1" : "2";
	}
	
}
?>