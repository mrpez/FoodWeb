<?php
	
	$errorString = '';
	$showForm = true;
	if( array_key_exists('businessName', $_POST) ) {
	
		if( strlen($_POST['businessName']) == 0 )
			$errorString .= 'Please provide your Business Name.<br />';
			
		if( strlen($_POST['foodtype']) == 0)
			$errorString .= 'Please provide what type of food you provide.<br />';
			
		//will continue to make more address fields for more information
		if( strlen($_POST['address']) == 0)
			$errorString .= 'Please provide the location of your business (Street Number, Street, City, State, ZipCode.<br />';
		
		if( strlen($_POST['phone']) == 0)
			$errorString .= 'Please provide a phone number for your business EX:(xxx-xxx-xxxx).<br />';
			
		if( strlen($errorString) == 0 ) {
			//still working on this! there is no user controller 
			$showForm = !$UserController->registerUser($_POST['businessName'], $_POST['foodtype'], $_POST['address'], $_POST['phone'], $_POST['password1']);
		}
	}
	
	
	
	if( $showForm == true) {
	//will continue to make more address fields for more information
		echo '<h1>Vendor Sign Up</h1>
			  <p>Here you can sign up to sell your own products on FoodWeb.</p>
			  <form method="post">
			  <span class="error">' . $errorString . '</span>
			  
				<table class="formTable">
					<tr>
						<td>Name</td>
						<td><input type="text" name="businessName" value="' . ((array_key_exists('businessName', $_POST)) ? $_POST['businessName'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Food Type:</td>
						<td><input type="text" name="foodtype" value="' . ((array_key_exists('foodtype', $_POST)) ? $_POST['foodtype'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type="text" name="address" value="' . ((array_key_exists('address', $_POST)) ? $_POST['address'] : '') . '"/></td>
					</tr>
					<tr>
						<td>Phone Number:</td>
						<td><input type="text" name="phone" value="' . ((array_key_exists('phone', $_POST)) ? $_POST['phone'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="Register"/></td>
				</table>
			  </form>';
	} else {
		echo '<p>Thank you for becoming a vendor! Please continue.</p>';
	}
		  
?>