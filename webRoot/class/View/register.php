<?php
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../Controller/UserController.php');
		$UserController = new UserController;
	}
	
	$errorString = '';
	$showForm = true;
	if( array_key_exists('name', $_POST) ) {
	
		if( strlen($_POST['name']) == 0 )
			$errorString .= 'Please provide your name.<br />';
			
		if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
			$errorString .= 'Please provide a valid email address.<br />';
			
		if( strlen($_POST['password1']) < 4 )
			$errorString .= 'Please provide a password at least 4 characters in length.<br />';
			
		if( $_POST['password1'] != $_POST['password2'] )
			$errorString .= 'Please make sure your passwords match.<br />';
			
		if( strlen($errorString) == 0 ) {
			$showForm = !$UserController->registerUser($_POST['email'], $_POST['name'], $_POST['password1']);
		}
	}
	
	if( $showForm == true) {
		echo '<form method="post">
				<h2>Register</h2>
				
				<span class="error">' . $errorString . '</span>

				<table class="formTable">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="' . ((array_key_exists('name', $_POST)) ? $Utility->sanitizeString($_POST['name']) : '') . '"/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="' . ((array_key_exists('email', $_POST)) ? $Utility->sanitizeString($_POST['email']) : '') . '"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password1" value=""/></td>
					</tr>
					<tr>
						<td>Retype Password</td>
						<td><input type="password" name="password2" value=""/></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Register"/></td>
				</table>
			  </form>';
	} else {
		echo '<p>Thank you for registering. You may now log in.</p>';
	}