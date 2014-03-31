<?php
	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/../Controller/LoginController.php');
		$LoginController = new LoginController();
	}
	
	$LoginController->logout();
?>