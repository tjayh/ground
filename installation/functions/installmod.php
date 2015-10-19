<?php
	error_reporting(0);

	//Install module
	$modtype = $_POST['modtype'];
	$modname = $_POST['modname'];
	$errorlist = array();
	$flag = true;
	if($modtype == 1){
		$direc = "modules/basic/".$modname;
	}
	else if($modtype == 2){
		$direc = "modules/premium/".$modname;
	}   
	else{
		$flag = false;
		$errorlist[] = "<br/><br/>Incorrect module type.";
	}
		
	if($flag){
		if ($handle = opendir($direc."/application")) {
			if (!file_exists($direc."/application/".$modname.".php"))
				$errorlist[] = "<br/>".$direc."/application/".$modname.".php doesn't exist.";
			if (!file_exists($direc."/application/".$modname."_model.php"))
				$errorlist[] = "<br/>".$direc."/application/".$modname."_model.php doesn't exist.";
			closedir($handle);
		}
		else{
			$errorlist[] = "Failed to open ".$modname."/application/ folder.";
		}
		if ($handle = opendir($direc."/skin")) {
			if (!file_exists($direc."/skin/index.html"))
				$errorlist[] = "<br/>".$direc."/skin/index.html doesn't exist.";
			closedir($handle);
		}
		else{
			$errorlist[] = "Failed to open ".$modname."/skin/ folder.";
		}
	}
	
	if(count($errorlist) > 0){
		$data['errorlist'] = $errorlist;
		echo json_encode($data);
	}else{
		//do copy and insertion in database

		session_start();
		$username = $_SESSION['dbuser'];
		$password = $_SESSION['dbpass'];
		$hostname = $_SESSION['dbserver']; 
		$database = $_SESSION['dbname'];
		$tableprefix = $_SESSION['tableprefix'];
		$mysqli = new mysqli($hostname, $username, $password, $database);
		$errorlist = array();
		if ($mysqli->connect_errno) {
			$errorlist[] = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		else{
			$chlen = strlen($modname);
			$ifmanager = substr($modname, $chlen-7, $chlen-1);
			if($ifmanager == 'manager') //insert to modules as admin
				$isAdmin = 1;
			else $isAdmin = 0;
			$query = "INSERT INTO ".$database.".`vii_module` (`id_module`, `module_name`, `module_description`, `module_class`, `link_rewrite`, `isAdmin`, `isRequired`, `isActive`, `date_add`, `date_upd`) VALUES (NULL, '".$modname."', '', '".$modname."', '".$modname."', '".$isAdmin."', '1', '1', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
			$result =  mysqli_query($mysqli,$query);
			if($result){
				if($isAdmin){
					$query = "SELECT `id_module` FROM `".$tableprefix."_module` ORDER BY `vii_module`.`id_module` DESC LIMIT 1";
					$result =  mysqli_query($mysqli,$query);
					if($result){
						$row = $result->fetch_row();
						$query = "INSERT INTO `installer`.`vii_admin_permission` (`id_admin_permission` ,`id_admin_group` ,`id_module` ,`sort_order` ,`isActive`)VALUES (NULL , '1', '".$row[0]."', '".$row[0]."', '1')";
						$result =  mysqli_query($mysqli,$query);
						if($result){
						
						}
						else{
							$errorlist[] = "Failed to insert in ".$tableprefix."_admin_permission table.";
						}
					}
					else
						$errorlist[] = "Failed to get id of ".$modname." in ".$tableprefix."_modules table";				
				}
				
				
				
			}
			else{
				$errorlist[] = "Failed to insert module data to ".$tableprefix."_modules table.";
			}
		}
		
	}
	
?>