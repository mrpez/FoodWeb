<?php
	$loginSuccess = false;	
	
	echo '<form method="post">
		  <h2>Login</h2>
		  <p>
			No login? <a href="/register.fw">Register here.</a><br />
			Forgot Password? <a href="/reset.fw">Reset here.</a>
		  </p>';
	if( array_key_exists('username', $_POST)
		&& !$loginSuccess )
	{
		echo '<p class="error">The username or password you entered is invalid. Please try again.</p>';
	}
	echo '<table>
				<tr>
					<td>
						Email
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