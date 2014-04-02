<?php

	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/../Controller/LoginController.php');
		$LoginController = new LoginController;
	}
	
	if( !class_exists('VendorController') ) {
		include(dirname(__FILE__) . '/../Controller/VendorController.php');
		$VendorController = new VendorController;
	}
	
	
	if( !$LoginController->getLoginStatus() ) {
		header('Location:/login.fw');
		die;
	}
	
	$errorString = '';
	$showForm = true;
	if( array_key_exists('businessName', $_POST) ) {
	
		if( strlen($_POST['businessName']) == 0 )
			$errorString .= 'Please provide your Business Name.<br />';
			
		if( strlen($_POST['foodtype']) == 0)
			$errorString .= 'Please provide what type of food you provide.<br />';
			
		//will continue to make more address fields for more information
		if( strlen($_POST['address']) == 0)
			$errorString .= 'Please provide the location of your business (Street Number, Street, City, State, ZipCode.<br />';
		
		if( strlen($_POST['phone']) == 0)
			$errorString .= 'Please provide a phone number for your business EX:(xxx-xxx-xxxx).<br />';
			
		if( strlen($errorString) == 0 ) {
			//still working on this! there is no user controller 
			$showForm = !$VendorController->promoteUserToVendor($LoginController->getUserIndex(), $_POST['businessName']);
		}
	}
	
	
	
?>