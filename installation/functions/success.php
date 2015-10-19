<?php
	session_start();
	if(!$_SESSION['predefined_theme']) rename("../../skin/viidemo", "../../skin/".$_SESSION['themefolder']);
	else{
		xx_copy('../../themes','../../skin');
	}
	copy("../includes/index.php", "../../index.php");
	copy("../includes/config.php", "../../config.php");
	copy("../includes/combine.php", "../../combine.php");
	copy("../includes/_.htaccess", "../../.htaccess");
	copy("../includes/robots.txt", "../../robots.txt");
	
	$dirPath = "../../installation";
	foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
		$path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
	}
	rmdir("../../installation");
	unlink('../../index.html');
	
	$username = $_SESSION['dbuser'];
	$password = $_SESSION['dbpass'];
	$hostname = $_SESSION['dbserver']; 
	$database = $_SESSION['dbname'];
	
	$mysqli = new mysqli($hostname, $username, $password, $database);
	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else{	
		//$_SESSION['themefolder']
		$query = "UPDATE `".$database."`.`vii_page` SET `vii_page`.`CUSTOM_THEME`='".$_SESSION['themefolder']."' where `vii_page`.`custom_theme`='viidemo'";
		$result =  mysqli_query($mysqli,$query);
		if(!$result){
			echo "Failed to connect to MySQL: (" , $mysqli->connect_errno , ") " , $mysqli->connect_error,"<br/>Contactus Error";
			exit(0);
		}
	}
	
	session_destroy();
	$segments = explode('/', $_SERVER['REQUEST_URI']);
	$requri = "";
	foreach($segments as $segment){
		if($segment == 'installation')
			break;
		$requri .= $segment.'/';
	}
	
	$serverurl = 'http://'.$_SERVER['HTTP_HOST'].$requri;
	echo $serverurl;
	
	function xx_copy($src,$dst) {
		$dir = opendir($src); 
		@mkdir($dst); 
		while(false !== ( $file = readdir($dir)) ) { 
			if (( $file != '.' ) && ( $file != '..' )) { 
				if ( is_dir($src . '/' . $file) ) { 
					xx_copy($src . '/' . $file,$dst . '/' . $file); 
				} 
				else { 
					copy($src . '/' . $file,$dst . '/' . $file); 
				} 
			} 
		} 
		closedir($dir); 
	} 
?>