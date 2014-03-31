<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
	
	<h1>FoodWeb Unit Tests</h1>
	<form method="post"><input type="submit" name="runTest" value="Run All Tests"/>

	<?php
		if( array_key_exists('runTest', $_POST) 
			&& $_POST['runTest'] == 'Run All Tests' ) {
			
			include('LoginUnitTests.php');
			
		}
	?>
	
</body>
</html>