<?php

	echo '<h1>Site Settings</h1>
		  <span style="color:green;">' . $result . '</span>
		  <form method="post">
			<table>
				<tr>
					<td>DB Type</td>
					<td>
						<select name="db_type">
							<option value="0">MySQL</option>
							<option value="1" ' . (((!array_key_exists('db_type', $_POST) && array_key_exists('db_type', $_COOKIE) && $_COOKIE['db_type'] == 'persistent') || (array_key_exists('db_type', $_POST) && $_POST['db_type'])) ? 'selected="selected"' : '') . '>Persistent</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Save Changes"/>
					</td>
				</tr>
			</table>
		  </form>';
?>