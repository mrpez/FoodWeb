<?php
	
	include(dirname(__FILE__) . '/class/model/Login.php');
	$Login = new Login;
	
	var_dump($Login->getLoginStatus());
	
?>