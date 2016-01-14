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
class SeoManager_model extends CI_Model

{
	var $error = array();
	function __construct()
	{
		parent::__construct();
	}
	function saveSettings()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			foreach($data as $name => $value) {
				$data2 = array();
				$data2['whr_name'] = $name;
				$data2['clmn_value'] = $value;
				$params['table'] = 'config';
				$params['post_data'] = $data2;
				$result = $this->dbtm->update($params);
				if (!$result) {
					$this->error[] = "Failed to update " . $name . '.';
				}
				unset($data2);
			}
			if (count($this->error)) {
				$result = array();
				$result['error'] = array();
				$result['error'][] = $this->error;
				return $result;
			}
			return true;
		}
		else {
			header('Location: ' . _BASE_URL_);
		}
	}
}
/* End of file seomanager_model.php */
/* Location: ./application/modules/generic/seomanager_model.php */
