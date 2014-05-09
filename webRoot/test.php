<?php

	include(dirname(__FILE__) . '/class/Controller/SearchController.php');
	$SearchController = new SearchController;
	
	echo '<pre>';
	$zips =($SearchController->getNearbyBusinesses('17403', '5'));
	
	var_dump($zips);
	echo '</pre>';
?>