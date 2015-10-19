<?php
	session_start();
	$username = $_SESSION['dbuser'];
	$password = $_SESSION['dbpass'];
	$hostname = $_SESSION['dbserver']; 
	$database = $_SESSION['dbname'];
	
	$mysqli = new mysqli($hostname, $username, $password, $database);
	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else{
		$sitename = $_POST['sitename'];
		$themefolder = $_POST['themefolder'];
		$_SESSION['themefolder'] =$themefolder;
		$adminname = $_POST['adminname'];
		$metaauthor = $_POST['metaauthor'];
		
		$fp = fopen('../includes/config.php', 'a');
				
		fwrite($fp, "	define('_THEME_','".$themefolder."');\n");
		fwrite($fp, "?>");
		fclose($fp);
		
		$flag = true;
		
		$segments = explode('/', $_SERVER['REQUEST_URI']);
		$requri = "";
		foreach($segments as $segment){
			if($segment == 'installation')
				break;
			$requri .= $segment.'/';
		}
		
		$serverurl = 'http://'.$_SERVER['HTTP_HOST'].$requri;
		$queries = array();
		$queries[] = "UPDATE `".$database."`.`vii_config` SET `vii_config`.`VALUE`='".$adminname."' where `vii_config`.`id`='2'";
		$queries[] = "UPDATE `".$database."`.`vii_config` SET `vii_config`.`VALUE`='".$sitename."' where `vii_config`.`id`='3'";
		$queries[] = "UPDATE `".$database."`.`vii_config` SET `vii_config`.`VALUE`='".$metaauthor."' where `vii_config`.`id`='5'";
		$queries[] = "UPDATE `".$database."`.`vii_config` SET `vii_config`.`VALUE`='".$serverurl."' where `vii_config`.`id`='11'";
		
		foreach($queries as $query){
			$result =  mysqli_query($mysqli,$query);
			if(!$result){
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				$flag = false;
				break;
			}
		}
		
		if($flag){
			
			$stat['flag'] = 'true';
			echo json_encode($stat);
		}
		
	}
?>