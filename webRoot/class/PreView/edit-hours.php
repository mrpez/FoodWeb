<?php
	$errorString = '';
	$showForm = true;
	var_dump($_POST);
	if( array_key_exists('opening_time', $_POST) ) {
	
		if( strlen($_POST['opening_time']) == 0 )
			$errorString .= 'Please provide your opening time.<br />';
			
		if( strlen($_POST['closing_time']) == 0)
			$errorString .= 'Please provide your closing time.<br />';
			
		if( strlen($errorString) == 0 ) {  
			!$VendorController->add_hours($_POST['day_of_week'], $_POST['opening_time'], $_POST['closing_time']);
			$showForm = false;
			
		}
	}
	
	
?>