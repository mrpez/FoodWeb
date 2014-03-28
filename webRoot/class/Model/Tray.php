<?php
	// This is really just a fancy name for Cart
	
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	
	class Tray extends Utility {
	
	}
	
?>