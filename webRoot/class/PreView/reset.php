<?php
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../Controller/UserController.php');
		$UserController = new UserController;
	}
					
	$errorString = '';
	$showForm = true;


	if( array_key_exists('email', $_POST) ) {
		if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
			$errorString .= 'Please provide a valid email address to reset password.<br/>';	
		
		if( strlen($errorString) == 0 ) {
			$showForm = !$UserController->forgotPass($_POST['email']);
		}
	}

?>