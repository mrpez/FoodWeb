<?php
//this is the view!
if( $showForm == true) {
		echo '<h1>Edit Store Locations</h1>
			  <p>Here you can edit your store locations.</p>
			  <p>Please enter below:</p>
			  <form method="post">
				<table class="formTable">
				<span class="error">' . $errorString . '</span>
					<tr>
						<td>Address Line:</td>
						<td><input type="text" name="address" value="' . ((array_key_exists('address', $_POST)) ? $_POST['address'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Zip Code:</td>
						<td><input type="text" name="zipcode" value="' . ((array_key_exists('zipcode', $_POST)) ? $_POST['zipcode'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="Submit Changes"/></td>
				</table>
			  </form>';
		echo '<p>Here are your current store locations:</p>';
		echo '<table>
				<tr>
					<th>Address</th>
					<th>Zip Code</th>
				</tr>';
		for($i = 0; $i < count($existing_store_locations); $i++) {
			echo '<tr>';
			echo '<td>' . $existing_store_locations[$i]['address'] . '</td>';
			echo '<td>' . $existing_store_locations[$i]['zipcode'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
			
	} else {
		echo '<p>Thank you for changing your store locations! Please continue.</p>';
	}
?>