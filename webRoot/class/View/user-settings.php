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
						<td>Edit AddressLineOne</td>
						<td><input type="text" name="addresslineone" value="' . ((array_key_exists('addresslineone', $_POST)) ? $_POST['addresslineone'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Edit City</td>
						<td><input type="text" name="city" value="' . ((array_key_exists('city', $_POST)) ? $_POST['city'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Edit State</td>
						<td><input type="text" name="state" value="' . ((array_key_exists('state', $_POST)) ? $_POST['state'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="usersettings"/></td>
				</table>
			  </form>';
	} else {
		echo '<p>Thank you for updating your settings.</p>';
	}
?>