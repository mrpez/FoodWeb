<?php

	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/../Controller/LoginController.php');
		$LoginController = new LoginController;
	}
	
	if( !$LoginController->getLoginStatus() ) {
		header('Location:/login.fw');
		die;
	}
	
	if( !class_exists('VendorController') ) {
		include(dirname(__FILE__) . '/../Controller/VendorController.php');
		$VendorController = new VendorController;
	}
	
	if( !$VendorController->isVendor() ) {
		header('Location:/vendor-signup.fw');
		die;
	}
	
	
	
?>