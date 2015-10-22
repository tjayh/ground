<?php
	//Get module names
	error_reporting(0);
	
	$modtype = $_POST['modtype'];
	$errorlist = array();
	$flag = true;
	if($modtype == 1){
		$direc = "../modules/basic";
	}
	else if($modtype == 2){
		$direc = "../modules/premium";
	}
	else{
		$flag = false;
		$errorlist[] = "<br/><br/>Incorrect module type.";
	}
	
	if($flag){
		$modnames = array('deals', 'downloads', 'job', 'loyalty', 'merchantportal', 'newsandevents', 'registration', 'testimonial', 'transaction');
		// if ($handle = opendir($direc)) {
			// // while (false !== ($entry = readdir($handle))) {
				// // if ($entry != "." && $entry != "..") {
					// // $modnames[] = $entry;
				// // }
			// // }
			// // closedir($handle);
		// }
		// else{
			// $flag = false;
			// if($modtype == 1)
				// $errorlist[] = "Failed to open basic modules directory.";
			// else
				// $errorlist[] = "Failed to open premium modules directory.";
		// }
		
		if($flag){
			$data['modnames'] = $modnames;
			echo json_encode($data);
		}
		else{
			$data['errorlist'] = $errorlist;
			echo json_encode($data);
		}
		
		
	}
?>