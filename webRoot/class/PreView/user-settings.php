<?php
	
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../UserController.php');
		$UserController = new UserController;
	}
	
	$errorString = '';
	$showForm = true;
	if( array_key_exists('visiblename', $_POST) ) {
	
		if( strlen($_POST['visiblename']) == 0 )
			$errorString .= 'Please enter the name you would others to see.<br />';
			
		if( strlen($_POST['zipcode']) == 0)
			$errorString .= 'Please provide your hometown(This will not be shared).<br />';
			
		if( strlen($errorString) == 0 ) {
			//still working on this!
			$showForm = !$USerController->;
	}

?>