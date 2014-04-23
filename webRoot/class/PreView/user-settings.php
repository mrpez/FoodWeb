<?php
	
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../Controller/UserController.php');
		$UserController = new UserController;
	}
	
	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/../Controller/LoginController.php');
		$LoginController = new LoginController;
	}
	
	if(!$LoginController->getLoginStatus()){
		header('Location: /login.fw');
		die;
	}
	
	$errorString = '';
	$showForm = true;
	if( array_key_exists('visiblename', $_POST) ) {
	
		if( strlen($_POST['visiblename']) == 0 )
			$errorString .= 'Please enter the name you would others to see.<br />';
			
		if( strlen($_POST['addresslineone']) == 0)
			$errorString .= 'Please provide address line one.<br />';
			
		if( strlen($_POST['city']) == 0)
			$errorString .= 'Please provide city.<br />';
		
		if( strlen($_POST['state']) == 0)
			$errorString .= 'Please provide your state.<br />';
			
		if( strlen($errorString) == 0 ) {
			$showForm = !$UserController->editUserSettings($LoginController->getUserIndex(), $_POST['visiblename'], $_POST['addresslineone'], $_POST['city'], $_POST['state']);
	}
	//$showForm = !$VendorController->promoteUserToVendor($LoginController->getUserIndex(), $_POST['businessName']);

?>