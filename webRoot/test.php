<?php

	include(dirname(__FILE__) . '/class/Controller/SearchController.php');
	$SearchController = new SearchController;
	
	echo '<pre>';
	var_dump($SearchController->getNearbyZipCodes('17403', '5'));
	echo '</pre>';
	
?>