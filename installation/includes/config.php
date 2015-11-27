<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	ob_start( 'ob_gzhandler' );
	define('_ADMIN_BASE_','administrator');
	define('_SKIN_PATH_',FCPATH.'skin/');
	define('_CACHE_FOLDER_',APPPATH.'cache/');
	define('_COLUMN_IDENTIFIER_','clmn_');
	define('_WHERE_IDENTIFIER_','whr_');
	define('_ADMIN_THEME_','aceadmin');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_DATABASE_','plugandplay_db');
	define('_DB_PREFIX_','vii_');
	define('_PRODUCTION_', TRUE);
	define('_BASE_URL_','http://10.10.1.12/plugandplay/');
	define('_URI_PROTOCOL_','REQUEST_URI');
	define('_ENABLE_QUERY_STRING_',FALSE);
	define('_ACTIVE_DB_','live');
	define('_THEME_','vii_ChangeThisToProjectName');
?>