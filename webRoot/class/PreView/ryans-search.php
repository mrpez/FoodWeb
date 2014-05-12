<?php

	if( !class_exists('SearchController') ) {
		include(dirname(__FILE__) . '/../controller/SearchController.php');
	}
	
	$SearchController = new SearchController;
	
	$searchResults = $SearchController->getNearbyBusinesses($_GET['zipcode'], $_GET['radiusofsearch']);

?>