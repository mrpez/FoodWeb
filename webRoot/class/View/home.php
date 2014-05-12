<?php
	if( !class_exists('SearchController') ) {
		include(dirname(__FILE__) . '/../Controller/SearchController.php');
		$SearchController = new SearchController;
	}
	
	$errorString = '';
	
	echo '<div style="text-align: center;">
		  <br /><br /><br />
		  <h1>Enter Your Zipcode</h1><br />
		  <h3>Conveniently Order from Food Vendors in Your Area!</h3><br />
		  <form method="get" action = "/ryans-search.fw">
			<table class="formTable" style="margin: 0 auto;">
			<span class="error">' . $errorString . '</span>
				<tr>
					<td>Distance</td>
					<td>
						<select name="radiusofsearch">
							<option value="5">5 Miles</option>
							<option value="10">10 Miles</option>
							<option value="15">15 Miles</option>
							<option value="20">20 Miles</option>
							<option value="50">50 Miles</option>
						</select>
					</td>
					<td>Zip Code:</td>
					<td><input type="text" name="zipcode" value="' . ((array_key_exists('zipcode', $_POST)) ? $_POST['zipcode'] : '') . '"/></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:center;"><input type="submit" value="Find Vendors"/></td>
				</tr>
			</table>
		  </form>
		  <br /><br /><br />
		  <hr />
		  <h3>Got Something to Sell on FoodWeb?</h3>
		  <p>Register to become a vendor with us below!</p>
		  <a href="/vendor-signup.fw">Vendor Signup</a>';

	  
	
?>