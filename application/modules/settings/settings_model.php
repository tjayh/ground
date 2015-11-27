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
class Settings_model extends CI_Model

{
	var $temp_dir = './temp/images/background/';
	var $temp_thumb_dir = './temp/images/background/thumb/';
	var $upload_dir = './upload/images/background/';
	var $upload_thumb_dir = './upload/images/background/thumb/';
	var $upload_favicon_dir = './upload/images/favicon/';
	var $upload_logo_dir = './upload/images/logo/';
	var $upload_thumb_logo_dir = './upload/images/logo/thumb/';
	var $temp_logo_dir = './temp/images/logo/';
	var $temp_thumb_logo_dir = './temp/images/logo/thumb/';
	var $temp_favicon_dir = './temp/images/favicon/';
	function __construct()
	{
		parent::__construct();
	}
	function get($name)
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('name', $name);
		$query = $this->db->get();
		if (!$query->num_rows()) {
			return false;
		}
		$row = $query->row_array();
		if($name) {
			return $row['value'];
		}
		else{
			return $row;
		}
		
	}
	function set($name, $value)
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('name', $name);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$data['name'] = $name;
			$data['value'] = $value;
			$data['date_add'] = date('Y-m-d H:i:s');
			$data['date_upd'] = $data['date_add'];
			if ($this->db->insert('config', $data)) {
				return true;
			}
		}
		else {
			if ($this->update($name, $value)) {
				return true;
			}
		}
		return false;
	}
	function getUsers()
	{
		$adminData = $this->session->userdata('adminData');
		$this->db->flush_cache();
		$this->db->select('a.*,ag.*,a.date_add as date');
		$this->db->from('admin a');
		if ($adminData['id_admin_group'] != 1) {
			$this->db->where('a.id_admin_group !=', 1);
		}
		$this->db->join('admin_group ag', 'a.id_admin_group = ag.id_admin_group', 'left');
		if ($this->input->post('id_admin')) {
			$id_admin = $this->input->post('group_name');
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getGroups()
	{
		$adminData = $this->session->userdata('adminData');
		$this->db->select('*');
		$this->db->from('admin_group');
		if ($adminData['id_admin_group'] != 1) {
			$this->db->where('id_admin_group !=', 1);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getLastModule()
	{
		$this->db->select('*');
		$this->db->from('module');
		$query = $this->db->get();
		if ($query->num_rows()) return $query->last_row('array');
		else return false;
	}
	function getModules($id_module = false)
	{
		$this->db->select('*');
		$this->db->from('module');
		if ($id_module) {
			$this->db->where('id_module', $id_module);
			$query = $this->db->get();
			if ($query->num_rows()) {
				return $query->row_array();
			}
			else{
				return false;
			}
		}
		$this->db->order_by('isAdmin');
		$this->db->order_by('module_name');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return = array();
			foreach($result as $item) {
				$item['json'] = htmlentities(json_encode($item) , ENT_QUOTES);
				$return[] = $item;
			}
			return $return;
		}
		return false;
	}
	function getPermissions($id_admin_group = false)
	{
		$adminData = $this->session->userdata('adminData');
		$this->db->select('*');
		$this->db->from('module');
		$this->db->where('isAdmin', 1);
		$query = $this->db->get();
		$result = $query->result_array();
		foreach($result as $item) {
			$this->db->flush_cache();
			$this->db->select('*, isActive as enabled');
			$this->db->from('admin_permission');
			$this->db->where('id_admin_group', $id_admin_group);
			$this->db->where('id_module', $item['id_module']);
			$module = $this->db->get();
			if ($module->num_rows()) {
				$item = array_merge($item, $module->row_array());
			}
			else {
				$data['id_admin_group'] = $id_admin_group;
				$data['id_module'] = $item['id_module'];
				$data['sort_order'] = $item['id_module'];
				$data['isActive'] = 0;
				$this->db->insert('admin_permission', $data);
			}
		}
		$this->db->select('m.*, m.isActive as isActive, ap.*, ap.isActive as enabled');
		$this->db->from('module m');
		$this->db->join('admin_permission ap', 'm.id_module = ap.id_module', 'left');
		if ($adminData['id_admin_group'] != 1) {
			$this->db->where('m.link_rewrite !=', 'breadcrumbs');
		}
		$this->db->where('m.isAdmin', 1);
		$this->db->where('m.isActive', 1);
		$this->db->where('ap.id_admin_group', $id_admin_group);
		$this->db->order_by('ap.sort_order', 'ASC');
		$query = $this->db->get();
		$results = $query->result_array();
		return $results;
	}
	function checkValidModule($moduleFolderName)
	{
		$result = array();
		$result['error'] = array();
		$pathToExtracted = './temp/modules/extracted/';
		$moduleClassDir = glob($pathToExtracted . $moduleFolderName . '/*', GLOB_ONLYDIR);
		$moduleClass = str_replace($pathToExtracted . $moduleFolderName . '/', "", $moduleClassDir[0]);
		$result['moduleClass'] = $moduleClass;
		$pathToFolder = './temp/modules/extracted/' . $moduleFolderName . '/' . $moduleClass . '/';
		$flag = true;
		if (!is_dir('./application/modules/' . $moduleClass)) {
			if (!is_dir($pathToFolder . 'application')) {
				$result['error'][] = "Invalid module folder structure: Application folder not found.";
				// $result['error'][] = $pathToFolder.'application';		//Uncomment to show path being accessed
				$flag = false;
			}
			else {
				if (!file_exists($pathToFolder . 'application/' . $moduleClass . '.php')) {
					$result['error'][] = "Invalid module folder structure: Controller not found.";
					$result['error'][] = $pathToFolder . 'application/' . $moduleClass . '.php';
					$flag = false;
				}
				if (!file_exists($pathToFolder . 'application/' . $moduleClass . '_model.php')) {
					$result['error'][] = "Invalid module folder structure: Model not found.";
					// $result['error'][] = $pathToFolder.'skin';		//Uncomment to show path being accessed
					$flag = false;
				}
			}
			if ($flag) {
				unset($result['error']);
			}
		}
		else {
			$result['error'][] = "Invalid module folder structure: Module class already exists in the active application/modules folder.";
			$result['error'][] = "Extracted module class: " . $moduleClass;
		}
		return $result;
	}
	function remove_comments(&$output)
	{
		$lines = explode("\n", $output);
		$output = "";
		// try to keep mem. use down
		$linecount = count($lines);
		$in_comment = false;
		for ($i = 0; $i < $linecount; $i++) {
			if (preg_match("/^\/\*/", preg_quote($lines[$i]))) {
				$in_comment = true;
			}
			if (!$in_comment) {
				$output.= $lines[$i] . "\n";
			}
			if (preg_match("/\*\/$/", preg_quote($lines[$i]))) {
				$in_comment = false;
			}
		}
		unset($lines);
		return $output;
	}
	function remove_remarks($sql)
	{
		$lines = explode("\n", $sql);
		// try to keep mem. use down
		$sql = "";
		$linecount = count($lines);
		$output = "";
		for ($i = 0; $i < $linecount; $i++) {
			if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0)) {
				if (isset($lines[$i][0]) && $lines[$i][0] != "#") {
					$output.= $lines[$i] . "\n";
				}
				else {
					$output.= "\n";
				}
				// Trading a bit of speed for lower mem. use here.
				$lines[$i] = "";
			}
		}
		return $output;
	}
	function split_sql_file($sql, $delimiter)
	{
		// Split up our string into "possible" SQL statements.
		$tokens = explode($delimiter, $sql);
		// try to save mem.
		$sql = "";
		$output = array();
		// we don't actually care about the matches preg gives us.
		$matches = array();
		// this is faster than calling count($oktens) every time thru the loop.
		$token_count = count($tokens);
		for ($i = 0; $i < $token_count; $i++) {
			// Don't wanna add an empty string as the last thing in the array.
			if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0))) {
				// This is the total number of single quotes in the token.
				$total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
				// Counts single quotes that are preceded by an odd number of backslashes,
				// which means they're escaped quotes.
				$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
				$unescaped_quotes = $total_quotes - $escaped_quotes;
				// If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
				if (($unescaped_quotes % 2) == 0) {
					// It's a complete sql statement.
					$output[] = $tokens[$i];
					// save memory.
					$tokens[$i] = "";
				}
				else {
					// incomplete sql statement. keep adding tokens until we have a complete one.
					// $temp will hold what we have so far.
					$temp = $tokens[$i] . $delimiter;
					// save memory..
					$tokens[$i] = "";
					// Do we have a complete statement yet?
					$complete_stmt = false;
					for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++) {
						// This is the total number of single quotes in the token.
						$total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
						// Counts single quotes that are preceded by an odd number of backslashes,
						// which means they're escaped quotes.
						$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);
						$unescaped_quotes = $total_quotes - $escaped_quotes;
						if (($unescaped_quotes % 2) == 1) {
							// odd number of unescaped quotes. In combination with the previous incomplete
							// statement(s), we now have a complete statement. (2 odds always make an even)
							$output[] = $temp . $tokens[$j];
							// save memory.
							$tokens[$j] = "";
							$temp = "";
							// exit the loop.
							$complete_stmt = true;
							// make sure the outer loop continues at the right point.
							$i = $j;
						}
						else {
							// even number of unescaped quotes. We still don't have a complete statement.
							// (1 odd and 1 even always make an odd)
							$temp.= $tokens[$j] . $delimiter;
							// save memory.
							$tokens[$j] = "";
						}
					} // for..
				} // else
			}
		}
		return $output;
	}
	function importSQL($sqlFile, $hostname = 'localhost', $errorArray)
	{
		$mysqli = new mysqli($hostname, _DB_USERNAME_, _DB_PASSWORD_, _DB_DATABASE_);
		if ($mysqli->connect_errno) {
			$errorArray[] = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		else {
			$dbms_schema = $sqlFile;
			$sql_query = @fread(@fopen($dbms_schema, 'r') , @filesize($dbms_schema)) or die('problem ');
			$sql_query = $this->remove_remarks($sql_query);
			$sql_query = $this->split_sql_file($sql_query, ';');
			$i = 1;
			foreach($sql_query as $sql) {
				if (mysqli_query($mysqli, $sql)) {
				}
				else {
					$errorArray[] = 'error in query at line ' . $i;
				}
				$i++;
			}
		}
		return $errorArray;
	}
	function deleteDirectory($source)
	{
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS) , RecursiveIteratorIterator::CHILD_FIRST) as $path) {
			$path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
		}
	}
	function copyFiles($source, $dest, $errorArray)
	{
		if (!is_dir($dest)) mkdir($dest, 0755, TRUE);
		foreach($iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS) , RecursiveIteratorIterator::SELF_FIRST) as $item) {
			if ($item->isDir()) {
				if (!mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName())) {
					$errorArray[] = "Failed to create new directory.";
					$errorArray[] = "  -> Directory path: " . $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
				}
			}
			else {
				if (!copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName())) {
					$errorArray[] = "Failed to copy file.";
					$errorArray[] = "  -> File path: " . $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
				}
			}
		}
		return $errorArray;
	}
	function getThemes()
	{
		$this->load->helper('directory');
		$themes = directory_map(_SKIN_PATH_, 1);
		$templates = array();
		foreach($themes as $theme) {
			if (strpos($theme, 'vii_') !== false) $templates[] = $theme;
		}
		return $templates;
	}
	function getThemeCss()
	{
		$this->load->helper('directory');
		$themes = directory_map(_SKIN_PATH_ . constant('_THEME_') . '/style', 1);
		$theme_css = array();
		foreach($themes as $theme) {
			if (strpos($theme, 'theme_') !== false) {
				$theme_css[] = $theme;
			}
		}
		return $theme_css;
	}
	function _changeTheme($theme)
	{
		$this->load->helper('directory');
		$old_theme = constant('_THEME_');
		$my_file = 'config.php';
		$reading = fopen($my_file, 'r');
		$writing = fopen('config.tmp', 'w');
		$matches = array();
		$reading = fopen($my_file, 'r');
		$replaced = false;
		if ($reading) {
			while (!feof($reading)) {
				$buffer = fgets($reading);
				if ((strpos($buffer, "'_THEME_'") !== FALSE && strpos($buffer, "//") === FALSE) || (strpos($buffer, "'_THEME_'") !== FALSE && strpos($buffer, "//") !== FALSE && strpos($buffer, "//") > strpos($buffer, "'_THEME_'"))) {
					$matches[] = $buffer;
					$buffer = str_replace(constant('_THEME_') , $theme, $buffer);
					$matches[] = $buffer;
					$replaced = true;
				}
				fputs($writing, $buffer);
			}
			fclose($reading);
			fclose($writing);
		}
		if ($replaced) {
			$this->db->where('custom_theme', $old_theme);
			$this->db->update('page', array(
				'custom_theme' => $theme
			));
			rename('config.tmp', $my_file);
		}
		else {
			unlink('config.tmp');
		}
		return true;
	}
	function _changeCss($old_color, $new_color, $theme = false)
	{
		if (!$theme) {
			$theme = _THEME_;
		}
		$filename = _SKIN_PATH_ . $theme . '/style/custom.css';
		$contents = file_get_contents($filename);
		$contents = str_replace($old_color, $new_color, $contents, $count);
		if ($count > 0) {
			file_put_contents($filename, $contents);
		}
		else {
			echo 'false';
			exit(0);
		}
	}
	function moveModuleFiles($moduleFolderName, $moduleClass, $isAdmin = false)
	{
		$moduleFolderName = str_replace(".zip", "", $moduleFolderName);
		$result = array();
		$result['error'] = array();
		// copy files and folders from application
		$source = './temp/modules/extracted/' . $moduleFolderName . '/' . $moduleClass . '/';
		$dest = './application/modules/' . $moduleClass . '/';
		$result['error'] = $this->copyFiles($source . 'application/', $dest, $result['error']);
		// copy files and folders from skin if it exists
		if (is_dir($source . 'skin/')) {
			$source = $source . 'skin/';
			if ($isAdmin) {
				$dest = './skin/' . _ADMIN_THEME_ . '/modules/' . $moduleClass . '/';
			}
			else {
				$dest = './skin/' . _THEME_ . '/modules/' . $moduleClass . '/';
			}
			$result['error'] = $this->copyFiles($source, $dest, $result['error']);
			if (is_dir($dest . 'js_includes')) {
				$source = $dest . 'js_includes';
				$dest = $dest . '../../js/includes/';
				$result['error'] = $this->copyFiles($source, $dest, $result['error']);
				$this->deleteDirectory($source);
				rmdir($source);
			}
		}
		// run sql file
		$source = './temp/modules/extracted/' . $moduleFolderName . '/' . $moduleClass . '/' . $moduleClass . '.sql';
		if (file_exists($source)) {
			$result['error'] = $this->importSQL($source, 'localhost', $result['error']);
		}
		else {
			$result['error'] = 'sql file does not exist';
			$result['error'] = '   ->source: ' . $source;
		}
		if (count($result['error']) > 0) {
			return $result;
		}
		return true;
	}
	function createModuleFiles($moduleClass, $isAdmin = false)
	{
		$result = array();
		$result['error'] = array();
		// Create module folder only if it doesn't exist in the application/modules folder
		if (!is_dir('./application/modules/' . $moduleClass)) {
			// create folder
			mkdir('./application/modules/' . $moduleClass, 0755, TRUE);
			if ($isAdmin) {
				mkdir('./skin/' . _ADMIN_THEME_ . '/modules/' . $moduleClass, 0755, TRUE);
			}
			else {
				mkdir('./skin/' . _THEME_ . '/modules/' . $moduleClass, 0755, TRUE);
			}
			// create controller
			$dbr = fopen('./application/modules/' . $moduleClass . '/' . $moduleClass . '.php', 'w');
			fwrite($dbr, '<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");');
			fwrite($dbr, "\n\n/**49.144.15.14\n * Vii Framework\n *\n * @package			ViiFramework (libraries from CodeIgniter)\n * @author			ViiWorks Production Team\n * @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.\n * @website url 	http://www.viiworks.com/\n * @filesource\n *\n\n */\n\n");
			fwrite($dbr, "class ");
			fwrite($dbr, ucfirst($moduleClass));
			fwrite($dbr, " extends MX_Controller {\n\tfunction __construct()\n\t{\n\t\tparent::__construct();\n\t\t");
			fwrite($dbr, '$this->load->model(');
			fwrite($dbr, "'");
			fwrite($dbr, $moduleClass);
			fwrite($dbr, "_model','");
			fwrite($dbr, $moduleClass);
			fwrite($dbr, "');\n\t}\n\n\tfunction index(){\n\t\t//echo 'Hello this is a new module';\n\n\t}\n}");
			fwrite($dbr, "\n\n?>");
			fclose($dbr);
			// create model
			$dbr = fopen('./application/modules/' . $moduleClass . '/' . $moduleClass . '_model.php', 'w');
			fwrite($dbr, '<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");');
			fwrite($dbr, "\n\n/**49.144.15.14\n * Vii Framework\n *\n * @package			ViiFramework (libraries from CodeIgniter)\n * @author			ViiWorks Production Team\n * @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.\n * @website url 	http://www.viiworks.com/\n * @filesource\n *\n\n */\n\n");
			fwrite($dbr, "class ");
			fwrite($dbr, ucfirst($moduleClass));
			fwrite($dbr, "_model extends CI_Model {\n\tfunction __construct()\n\t{\n\t\tparent::__construct();\n\t\t");
			fwrite($dbr, "\n\t}\n}");
			fwrite($dbr, "\n\n?>");
			fclose($dbr);
			// create js
			if ($isAdmin) {
				$dbr = fopen('./skin/' . _ADMIN_THEME_ . '/js/includes/' . $moduleClass . '.index.js', 'w');
			}
			else {
				$dbr = fopen('./skin/' . _THEME_ . '/js/includes/' . $moduleClass . '.js', 'w');
			}
			fwrite($dbr, '/* javascript exclusively for this module */');
			fclose($dbr);
			// create html
			if ($isAdmin) {
				$dbr = fopen('./skin/' . _ADMIN_THEME_ . '/modules/' . $moduleClass . '/index.html', 'w');
			}
			else {
				$dbr = fopen('./skin/' . _THEME_ . '/modules/' . $moduleClass . '/index.html', 'w');
			}
			fwrite($dbr, '<!-- html exclusively for this module -->');
			fclose($dbr);
		}
		if (count($result['error']) > 0) {
			return $result;
		}
		return true;
	}
	function _uploadImage($type = false)
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadImage($this->temp_dir, $this->temp_thumb_dir, false, false, $type);
	}
	function _uploadLogo()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadImage($this->temp_logo_dir, $this->temp_thumb_logo_dir, false, false, $type);
	}
	function _uploadFavicon()
	{
		$this->load->model('core/uploader_model', 'uploader');
		$this->uploader->_uploadFavicon($this->temp_favicon_dir);
	}
	function _moveImages($image = false)
	{
		$result = array();
		$result['error'] = array();
		if (!is_dir($this->upload_dir)) {
			mkdir($this->upload_dir, 0777, TRUE);
			mkdir($this->upload_thumb_dir, 0777, TRUE);
		}
		if($image){
			$data['image_src'] = $image;
		}
		else{
			$data = $this->input->post('data');
		}
		if (!file_exists($this->upload_dir . $data['image_src'])) {
			if (!copy($this->temp_dir . $data['image_src'], $this->upload_dir . $data['image_src'])) {
				$result['error'][] = "Failed to copy image to active folder.";
			}
			if (!unlink($this->temp_dir . $data["image_src"])) {
				$result['error'][] = "Failed to delete image to temporary folder.";
			}
			if (!copy($this->temp_thumb_dir . $data['image_src'], $this->upload_thumb_dir . $data['image_src'])) {
				$result['error'][] = "Failed to copy image to active folder.";
			}
			if (!unlink($this->temp_thumb_dir . $data["image_src"])) {
				$result['error'][] = "Failed to delete image to temporary folder.";
			}
		}
		if (count($result['error']) > 0) {
			return $result;
		}
		return true;
	}
	function _moveLogoImages()
	{
		$result = array();
		$result['error'] = array();
		$data = $this->input->post('data');
		if (!is_dir($this->upload_logo_dir)) {
			mkdir($this->upload_logo_dir, 0777, TRUE);
			mkdir($this->upload_thumb_logo_dir, 0777, TRUE);
		}
		if (!file_exists($this->upload_logo_dir . $data['site_logo'])) {
			if (!copy($this->temp_logo_dir . $data['site_logo'], $this->upload_logo_dir . $data['site_logo'])) {
				$result['error'][] = "Failed to copy image to active folder.";
			}
			if (!unlink($this->temp_logo_dir . $data["site_logo"])) {
				$result['error'][] = "Failed to delete image to temporary folder.";
			}
			if (!copy($this->temp_thumb_logo_dir . $data['image_src'], $this->upload_thumb_logo_dir . $data['image_src'])) {
				$result['error'][] = "Failed to copy image to active folder.";
			}
			if (!unlink($this->temp_thumb_logo_dir . $data["site_logo"])) {
				$result['error'][] = "Failed to delete image to temporary folder.";
			}
		}
		if (count($result['error']) > 0) {
			return $result;
		}
		return true;
	}
	function _moveFaviconImages()
	{
		$result = array();
		$result['error'] = array();
		$data = $this->input->post('data');
		if (!file_exists($this->upload_favicon_dir . $data['site_favicon'])) {
			if (!copy($this->temp_favicon_dir . $data['site_favicon'], $this->upload_favicon_dir . $data['site_favicon'])) {
				$result['error'][] = "Failed to copy image to active folder.";
			}
			if (!unlink($this->temp_favicon_dir . $data["site_favicon"])) {
				$result['error'][] = "Failed to delete image to temporary folder.";
			}
		}
		if (count($result['error']) > 0) {
			return $result;
		}
		return true;
	}
	function _changeStatus()
	{
		$data = $this->input->post('data');
		if ($data) {
			$this->load->model('core/dbtm_model', 'dbtm');
			$params['table'] = 'admin';
			$params['post_data'] = $data;
			$result = $this->dbtm->update($params);
			if ($result) {
				return true;
			}
		}
		else { //direct link access
			header('Location: ' . _BASE_URL_);
		}
	}
	function _updateStyle()
	{
		$data = array();
		if($this->input->cookie('style', TRUE)){
			$data['color_schemes'] = $this->input->cookie('style', TRUE);
		}
		else{
			$data['color_schemes'] = '';
		}
		if($this->input->cookie('color_skin', TRUE)){
			$data['color_skin'] = $this->input->cookie('color_skin', TRUE);
		}
		else{
			$data['color_skin'] = '';
		}
		if($this->input->cookie('is_boxed', TRUE)){
			$data['layout_style'] = $this->input->cookie('is_boxed', TRUE);
		}
		else{
			$data['layout_style'] = '';
		}
		if($this->input->cookie('_direction', TRUE)){
			$data['layout_rtl'] = $this->input->cookie('_direction', TRUE);
		}
		else{
			$data['layout_rtl'] = '';
		}
		if($this->input->cookie('pattern_switch', TRUE)){
			$data['patterns'] = $this->input->cookie('pattern_switch', TRUE);
		}
		else{
			$data['patterns'] = '';
		}
		if($this->input->cookie('background_switch', TRUE)){
			$data['boxed_background'] = $this->input->cookie('background_switch', TRUE);
		}
		else{
			$data['boxed_background'] = '';
		}
		$where['id_config_style'] = 1;
		if ($data) {
			$this->db->where($where);
			$result = $this->db->update('config_style', $data);
			if ($result) {
				return true;
			}
		}
	}
}
?>