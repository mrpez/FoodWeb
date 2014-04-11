<?php
	if( !class_exists('LoginController') ) {
		include(dirname(__FILE__) . '/class/Controller/LoginController.php');
		$LoginController = new LoginController;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FoodWeb</title>
	<!---<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Bangers|Titan+One' rel='stylesheet' type='text/css'>--->
	<style type="text/css">
		body {
			padding: 0;
			margin: 0;
		}
		
		div#headerBand {
			background-color: #121212;
			color: #FEFEFE;
			padding: 3px 5px;
			margin: 0;
		}
		
		div#headerBand a#logo {
			text-decoration: none;
			font-family: Bangers;
			letter-spacing: 2px;
		}

		span#logoSubtext {
			font-family:'Titan One';
			font-size: 13px;
			margin-left: 5px;
			margin-top: 16px;
			float: left;
		}
		
		div#headerBand a {
			color: #FEFEFE;
		}
		
		div#headerTitle {
			float: left;
		}
		
		div#headerControls {
			float: right;
		}
		
		h1, h2, h3 {
			padding: 0;
			margin: 0;
		}
		
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<div id="headerBand">
		<div id="headerTitle">
			<a id="logo" href="/"><h1>FoodWeb</h1></a>
		</div>
		<span id="logoSubtext">Order Fast. Eat Well. FoodWeb.</span>
		<div id="headerControls">
			<a href="/site-settings.fw">Site Settings</a> |
			<?php
				if( $LoginController->getLoginStatus() )
					echo '<a href="/logout.fw">Logout</a>';
				else
					echo '<a href="/login.fw">Login</a>';
			?>
		</div>
		<div style="clear:both;"></div>
	</div>