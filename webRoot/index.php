<?php

include("header.php");

echo 'This is the FoodWeb Homepage. Login to start!<br /><br />
	  <h3>Actions</h3>
	  <ul>
		<li><a href="/worksheet.fw">FoodWeb Worksheet - Stuffs to do</a></li>
		<li><a href="/vendor-home.fw">Vendor Home</a></li>
		<li><a href="/vendor-signup.fw">Become a Vendor</a></li>
	  </ul>';
	  
	  var_dump($LoginController->getUserIndex());


include("footer.php");

?>