<?php
	if( $showForm == true) {
	//will continue to make more address fields for more information
		echo '<h1>User Settings</h1>
			  <p>Here you can change your settings on FoodWeb.</p>
			  <form method="post">
			  <span class="error">' . $errorString . '</span>
			  
				<table class="formTable">
					<tr>
						<td>Edit Name</td>
						<td><input type="text" name="visiblename" value="' . ((array_key_exists('visiblename', $_POST)) ? $_POST['visiblename'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Edit Zipcode:</td>
						<td><input type="text" name="zipcode" value="' . ((array_key_exists('zipcode', $_POST)) ? $_POST['zipcode'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="usersettings"/></td>
				</table>
			  </form>';
	} else {
		echo '<p>Thank you for becoming a vendor! Please continue.</p>';
	}
?>