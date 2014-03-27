<?php
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/class/Utility.php');
		$Utility = new Utility;
	}
	
	$Utility->getPDO();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FoodWeb</title>
</head>
<body>
	<h1>Food Web Home Page</h1>