<?php
	
	echo '<form method="post">
		  <h1>FoodWeb</h1>';
	
	
	
	$loginSuccess = false;
	
	if( array_key_exists('username', $_POST)
		&& array_key_exists('password', $_POST) )
	{
		if( !class_exists('LoginController') ) {
			include(dirname(__FILE__) . '/class/controller/LoginController.php');
			$LoginController = new LoginController;
		}
		
		$loginSuccess = $LoginController->login($_POST['username'], $_POST['password']);
		
	}
	
	echo '<form method="post">
		  <h1>Vendor Login</h1>';
	if( array_key_exists('username', $_POST)
		&& !$loginSuccess )
	{
		echo '<span style="color:red;">The username or password you entered is invalid. Please try again.';
	}
	echo '<table>
				<tr>
					<td>
						Username
					</td>
					<td>
						<input type="text" name="username" ';
						if(array_key_exists('username', $_POST))
							echo 'value="' . $_POST['username'] . '"';
	echo '  		>
					</td>
				</tr>
				<tr>
					<td>
						Password
					</td>
					<td>
						<input type="password" name="password"/>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Login"/>
				</tr>
			</table>
		  </form>';
	
	
?>