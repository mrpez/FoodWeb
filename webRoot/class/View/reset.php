<?php
	
	if( $showForm == true) {	
		echo '<form method="post">
					<h2>Reset</h2>
					
					<span class="error">' . $errorString . '</span>

					<table class="formTable">
					<tr>
							<td>Email</td>
							<td><input type="text" name="email" value="' . ((array_key_exists('email', $_POST)) ? $Utility->sanitizeString($_POST['email']) : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="Send Key"/></td>
					</table>
				  </form>';
	} else {
		echo "<p>Thank you ". $email ." for reseting your password. Please wait a few moments while systems proccess. </p>";
	}
	?>