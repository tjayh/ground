<?php
	$original = basename( $_FILES['userfile']['name']);
	$target_path = "../includes/";
	$target_path = $target_path . 'default.sql'; 
	
	if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
		echo basename( $_FILES['userfile']['name']);
	} else{
		//error uploading file
	}
?>