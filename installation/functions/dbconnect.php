<?php
	session_start();
	$username =  $_POST['dbuser'];
	$password =  $_POST['dbpass'];
	$hostname  = $_POST['dbserver']; 
	$database =  $_POST['dbname'];
	$tableprefix = $_POST['tablepref'];
	$_SESSION['dbuser'] =$username;
	$_SESSION['dbpass'] =$password;
	$_SESSION['dbserver'] = $hostname;
	$_SESSION['dbname'] =$database;
	$_SESSION['predefined_theme'] =false;
	
	ini_set('memory_limit', '5120M');
	set_time_limit ( 0 );

	$flag = true;
	$stat = null;
	$errormsg = null;
	$mysqli = new mysqli($hostname, $username, $password, $database);
	if ($mysqli->connect_errno) {
		$errormsg = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		$flag = false;
	}
	else{
		$reset = true; //resets the database and auto create the default tables
		if($reset)
		{
			$res = mysqli_query($mysqli,"SHOW TABLES");
			while($cRow = mysqli_fetch_array($res))
			{
				mysqli_query($mysqli,"DROP TABLE IF EXISTS ".$cRow[0]);
			}
			
			
			$dbms_schema = '../includes/default.sql';
			$dbarr = file($dbms_schema);
			if (strpos($dbarr[21],'DATABASE') !== false) {
				$dbarr[21] ="\n";
				$dbarr[22] ="\n";
			}
			$dbfin = implode("",$dbarr);
			$dbmysql = fopen('../includes/default.sql', 'w');
			fwrite($dbmysql, $dbfin);
			fclose($dbmysql);
			
			$sql_query = @fread(@fopen($dbms_schema, 'r'), @filesize($dbms_schema)) or die('problem ');
			$sql_query = remove_remarks($sql_query);
			$sql_query = split_sql_file($sql_query, ';');
			

			$i=1;
			foreach($sql_query as $sql){
				
				mysqli_query($mysqli,$sql) or die('error in query at line '.$i);
				
				
				
			}
		}
		if($flag){
			//create config.php
			$fp = fopen('../includes/config.php', 'w');
			$f = fopen("../includes/revert.php", "r");
			while ( $line = fgets($f, 500) ) {
				fwrite($fp, $line);
			}
			fclose($f);
			
			
			fwrite($fp, "\n	define('_DB_USERNAME_','".$username."');\n");
			fwrite($fp, "	define('_DB_PASSWORD_','".$password."');\n");
			fwrite($fp, "	define('_DB_DATABASE_','".$database."');\n");
			fwrite($fp, "	define('_DB_PREFIX_','".$tableprefix."');\n");
			
			if($_SERVER['HTTP_HOST']=='localhost'){
				fwrite($fp, "	define('_URI_PROTOCOL_','PATH_INFO');\n");
				$segments = explode('/', $_SERVER['REQUEST_URI']);
				$requri = "";
				foreach($segments as $segment){
					if($segment == 'installation')
						break;
					$requri .= $segment.'/';
				}
				fwrite($fp, "	define('_BASE_URL_','http://".$_SERVER['HTTP_HOST'].$requri."');\n");
				fwrite($fp, "	define('_ENABLE_QUERY_STRING_',TRUE);\n");
				fwrite($fp, "	define('_ACTIVE_DB_','default');\n");
			}
			else{
				fwrite($fp, "	define('_PRODUCTION_', TRUE);\n");
				$segments = explode('/', $_SERVER['REQUEST_URI']);
				$requri = "";
				foreach($segments as $segment){
					if($segment == 'installation')
						break;
					$requri .= $segment.'/';
				}
				fwrite($fp, "	define('_BASE_URL_','http://".$_SERVER['HTTP_HOST'].$requri."');\n");
				/* fwrite($fp, "	define('_BASE_URL_','http://".$_SERVER['HTTP_HOST']."/');\n"); */
				fwrite($fp, "	define('_URI_PROTOCOL_','REQUEST_URI');\n");
				fwrite($fp, "	define('_ENABLE_QUERY_STRING_',FALSE);\n");
				fwrite($fp, "	define('_ACTIVE_DB_','live');\n");
			}
			
			fclose($fp);
			$stat['flag'] = 'true';
			$stat['themes'] = get_themes();
			
			
			if(count($stat['themes'])) $_SESSION['predefined_theme'] = true;
			echo json_encode($stat);
		}
		else{

			echo $errormsg;
		}

	}
	
	function get_themes(){
		$directory = '../../themes';
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		return array_values($scanned_directory);
	}
	
	function remove_comments(&$output)
	{
	   $lines = explode("\n", $output);
	   $output = "";

	   // try to keep mem. use down
	   $linecount = count($lines);

	   $in_comment = false;
	   for($i = 0; $i < $linecount; $i++)
	   {
		  if( preg_match("/^\/\*/", preg_quote($lines[$i])) )
		  {
			 $in_comment = true;
		  }

		  if( !$in_comment )
		  {
			 $output .= $lines[$i] . "\n";
		  }

		  if( preg_match("/\*\/$/", preg_quote($lines[$i])) )
		  {
			 $in_comment = false;
		  }
	   }

	   unset($lines);
	   return $output;
	}

//
// remove_remarks will strip the sql comment lines out of an uploaded sql file
//
	function remove_remarks($sql)
	{
	   $lines = explode("\n", $sql);

	   // try to keep mem. use down
	   $sql = "";

	   $linecount = count($lines);
	   $output = "";

	   for ($i = 0; $i < $linecount; $i++)
	   {
		  if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0))
		  {
			 if (isset($lines[$i][0]) && $lines[$i][0] != "#")
			 {
				$output .= $lines[$i] . "\n";
			 }
			 else
			 {
				$output .= "\n";
			 }
			 // Trading a bit of speed for lower mem. use here.
			 $lines[$i] = "";
		  }
	   }

	   return $output;

	}

//
// split_sql_file will split an uploaded sql file into single sql statements.
// Note: expects trim() to have already been run on $sql.
//
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
	   for ($i = 0; $i < $token_count; $i++)
	   {
		  // Don't wanna add an empty string as the last thing in the array.
		  if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0)))
		  {
			 // This is the total number of single quotes in the token.
			 $total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
			 // Counts single quotes that are preceded by an odd number of backslashes,
			 // which means they're escaped quotes.
			 $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);

			 $unescaped_quotes = $total_quotes - $escaped_quotes;

			 // If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
			 if (($unescaped_quotes % 2) == 0)
			 {
				// It's a complete sql statement.
				$output[] = $tokens[$i];
				// save memory.
				$tokens[$i] = "";
			 }
			 else
			 {
				// incomplete sql statement. keep adding tokens until we have a complete one.
				// $temp will hold what we have so far.
				$temp = $tokens[$i] . $delimiter;
				// save memory..
				$tokens[$i] = "";

				// Do we have a complete statement yet?
				$complete_stmt = false;

				for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++)
				{
				   // This is the total number of single quotes in the token.
				   $total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
				   // Counts single quotes that are preceded by an odd number of backslashes,
				   // which means they're escaped quotes.
				   $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);

				   $unescaped_quotes = $total_quotes - $escaped_quotes;

				   if (($unescaped_quotes % 2) == 1)
				   {
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
				   else
				   {
					  // even number of unescaped quotes. We still don't have a complete statement.
					  // (1 odd and 1 even always make an odd)
					  $temp .= $tokens[$j] . $delimiter;
					  // save memory.
					  $tokens[$j] = "";
				   }

				} // for..
			 } // else
		  }
	   }

	   return $output;
	}
	
	
?>