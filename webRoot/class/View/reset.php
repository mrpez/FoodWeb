<?php
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../Controller/UserController.php');
		$UserController = new UserController;
	}
	
	$errorString = '';
	$showForm = true;

	
	if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		$errorString .= 'Please provide a valid email address to reset password.<br />';
	if( $showForm == true) {
	
	echo '<form method="post">
				<h2>Register</h2>
				
				<span class="error">' . $errorString . '</span>

				<table class="formTable">
				<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="' . ((array_key_exists('email', $_POST)) ? $Utility->sanitizeString($_POST['email']) : '') . '"/></td>
				</tr>
							</table>
			  </form>';
	
	else {
		
		echo '<p>Thank you "$email" for reseting your password. Please wait a few moments while systems proccess. </p>';
	}
	?>