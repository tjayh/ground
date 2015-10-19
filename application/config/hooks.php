<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'][] = array(
	'class'    => 'Globals',
	'function' => 'checkPermission',
	'filename' => 'Globals.php',
	'filepath' => 'hooks'
);
$hook['post_controller_constructor'][] = array(
	'class'    => 'Globals',
	'function' => 'assign',
	'filename' => 'Globals.php',
	'filepath' => 'hooks'
);
$hook['post_controller_constructor'][] = array(
	'class'    => 'Globals',
	'function' => 'variables',
	'filename' => 'Globals.php',
	'filepath' => 'hooks'
);
$hook['post_controller_constructor'][] = array(
	'class'    => 'Globals',
	'function' => 'getCurrentPage',
	'filename' => 'Globals.php',
	'filepath' => 'hooks'
);
$hook['post_controller'][] = array(
	'class'    => 'Globals',
	'function' => 'display',
	'filename' => 'Globals.php',
	'filepath' => 'hooks'
);
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */