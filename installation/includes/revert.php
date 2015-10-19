<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	ob_start( 'ob_gzhandler' );
	define('_ADMIN_BASE_','administrator');
	define('_SKIN_URL_',FCPATH.'skin/');
	define('_CACHE_FOLDER_',APPPATH.'cache/');
	define('_UPLOAD_URL_',FCPATH.'upload/products/');
	define('_UPLOAD_LOGO_URL_',FCPATH.'upload/merchant/');
	define('_COLUMN_IDENTIFIER_','clmn_');
	define('_WHERE_IDENTIFIER_','whr_');
	define('_ADMIN_THEME_','aceadmin');