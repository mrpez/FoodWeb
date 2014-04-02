<?php
	
	echo '<h1>Vendor Sign Up</h1>
		  <p>Here you can sign up to sell your own products on FoodWeb.</p>
		  <form method="post">
			<table class="formTable">
				<tr>
					<td>Business Name</td>
					<td><input type="text" name="businessName" value="' . ((array_key_exists('businessName', $_POST)) ? $_POST['businessName'] : '') . '"/></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><input type="text" name="phone" value="' . ((array_key_exists('phone', $_POST)) ? $_POST['phone'] : '') . '"/></td>
				</tr>
			</table>
		  </form>';

		  
?>