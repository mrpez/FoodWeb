<?php
	
	echo '<h1>Find Local Vendors</h1>
		  <form method="get">
		  <span style="font-weight:bold; padding-left: 3px;">Refine Results</span>
			<table style="font-size: 13px;">
				<tr>
					<td>Distance</td>
					<td>
						<select name="radiusofsearch">
							<option value="5">5 Miles</option>
							<option value="10" ' . (($_GET['radiusofsearch'] == 10) ? 'selected="selected"' : '') . '>10 Miles</option>
							<option value="15" ' . (($_GET['radiusofsearch'] == 15) ? 'selected="selected"' : '') . '>15 Miles</option>
							<option value="20" ' . (($_GET['radiusofsearch'] == 20) ? 'selected="selected"' : '') . '>20 Miles</option>
							<option value="50" ' . (($_GET['radiusofsearch'] == 50) ? 'selected="selected"' : '') . '>50 Miles</option>
						</select>
					</td>
					<td>Zip Code:</td>
					<td><input type="text" name="zipcode" value="' . ((array_key_exists('zipcode', $_GET)) ? $_GET['zipcode'] : '') . '"/></td>
					<td colspan="4" style="text-align:center;"><input type="submit" value="Search"/></td>
				</tr>
			</table>
		  </form>
		  <p>Your search returned ' . count($searchResults) . ' result' . ((count($searchResults) > 1) ? 's' : '') . '.</p>
		  <div id="searchTable">';
			for( $i = 0; $i < count($searchResults); $i++) {
				$cityInfo = $SearchController->getCityState($searchResults[$i]['zipcode']);
				echo '<div class="searchResultContainer">
						<h3>' . $searchResults[$i]['name'] . '</h3>
						<p class="vendorAddress">
							' . $searchResults[$i]['address'] . '<br />
							' . $cityInfo['city'] . ', ' . $cityInfo['state'] . ' ' . $searchResults[$i]['zipcode'] . '
							
						</p>
						<a href="/view-vendor.fw?vendorId=' . $searchResults[$i]['vendor_id'] . '&locationId=' . $searchResults[$i]['location_id'] . '">More Info</a>
					  </div>';
			}
	echo '</div><!-- end searchTable -->';
	
?>