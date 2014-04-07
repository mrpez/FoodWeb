<?php
//this is the view!
if( $showForm == true) {
		echo '<h1>Edit Hours</h1>
			  <p>Here you can edit your business hours for each day of the week.</p>
			  <form method="post">
				<table class="formTable">
				<span class="error">' . $errorString . '</span>
					<tr>
						<select name="day_of_week">
							<option value="0">Sunday</option>
							<option value="1">Monday</option>
							<option value="2">Tuesday</option>
							<option value="3">Wednesday</option>
							<option value="4">Thursday</option>
							<option value="5">Friday</option>
							<option value="6">Saturday</option>
						</select>
					</tr>
					<tr>
						<td>Opening Time:</td>
						<td><input type="text" name="opening_time" value="' . ((array_key_exists('opening_time', $_POST)) ? $_POST['opening_time'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Closing Time:</td>
						<td><input type="text" name="closing_time" value="' . ((array_key_exists('closing_time', $_POST)) ? $_POST['closing_time'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="Submit Changes"/></td>
				</table>
			  </form>';
	} else {
		echo '<p>Thank you for changing your hours! Please continue.</p>';
	}
?>