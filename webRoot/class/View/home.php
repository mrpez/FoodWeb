<?php
	if( !class_exists('SearchController') ) {
		include(dirname(__FILE__) . '/../Controller/SearchController.php');
		$SearchController = new SearchController;
	}
	
	$errorString = '';
	$showForm = true;
	//var_dump($_POST);
	
	//action = "/search-results.fw"
	if( $showForm == true) {
		echo '<h1>Enter Your Zipcode</h1>
			  <p>You can see local vendors in a preset radius.</p>
			  <p>Please enter below:</p>
			  <form method="get" action = "/search-results.fw">
				<table class="formTable">
				<span class="error">' . $errorString . '</span>
					<tr>
						<select name="radiusofsearch">
							<option value="5">5 Miles</option>
							<option value="10">10 Miles</option>
							<option value="15">15 Miles</option>
							<option value="20">20 Miles</option>
							<option value="50">50 Miles</option>
						</select>
					</tr>
					<tr>
						<td>Zip Code:</td>
						<td><input type="text" name="zipcode" value="' . ((array_key_exists('zipcode', $_POST)) ? $_POST['zipcode'] : '') . '"/></td>
					</tr>
					<tr>
							<td colspan="2"><input type="submit" value="Submit Changes"/></td>
				</table>
			  </form>';
		echo '<br /><br />Vendors: Please login to start!<br /><br />
			  <h3>Actions</h3>
			  <ul>
				<li><a href="/worksheet.fw">FoodWeb Worksheet - Stuffs to do</a></li>
				<li><a href="/vendor-home.fw">Vendor Home</a></li>
				<li><a href="/vendor-signup.fw">Become a Vendor</a></li>
			  </ul>';	  
	
	} else {
		echo '<h3>Actions</h3>
			  <ul>
				<li><a href="/search-results.fw">Link to Results- Fix This!</a></li>
			  </ul>';
	}

	  
	
?>