<?php
	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/class/Controller/LoginController.php');
	}
	if( !isSet($LoginController) )
		$LoginController = new LoginController;
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FoodWeb</title>
	<script src="/lib/js/jquery.1.11.0.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Bangers|Titan+One' rel='stylesheet' type='text/css'>
	<link href='/lib/css/main.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="headerBand">
		<div id="headerTitle">
			<a id="logo" href="/"><h1>FoodWeb</h1></a>
		</div>
		<span id="logoSubtext">Order Fast. Eat Well. FoodWeb.</span>
		<div id="headerControls">
			<a href="/site-settings.fw">Site Settings</a> |
			<a href="/vendor-home.fw">Vendor Page</a> |
			<?php
				if( $LoginController->getLoginStatus() )
					echo '<a href="/logout.fw">Logout</a>';
				else
					echo '<a href="/login.fw">Login</a>';
			?>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div id="contentContainer">