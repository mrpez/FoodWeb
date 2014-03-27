<?php
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/class/LoginController.php');
		$LoginController = new LoginController;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FoodWeb</title>
</head>
<body>
	<h1>Food Web Home Page</h1>