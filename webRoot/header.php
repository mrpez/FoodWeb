<?php
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/class/Controller/LoginController.php');
		$LoginController = new LoginController;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FoodWeb</title>
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
		<div id="headerControls">
			<?php
				if( $LoginController->getLoginStatus() )
					echo '<a href="/view.php?view=logout">Logout</a>';
				else
					echo '<a href="/view.php?view=login">Login</a>';
			?>
		</div>
		<div style="clear:both;"></div>
	</div>