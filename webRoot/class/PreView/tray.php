<?php
	if( array_key_exists('username', $_POST)
		&& array_key_exists('password', $_POST) )
	{
		include(dirname(__FILE__) . '/../Controller/LoginController.php');
		$LoginController = new LoginController;
				
		$LoginController->login($_POST['username'], $_POST['password']);
		
		if( $LoginController->getLoginStatus() ) {
			header('Location: /');
			die;
		}
		
		include(dirname(__FILE__) . '/../Controller/TrayController.php');
		$TrayController = new TrayController;
	}
?>