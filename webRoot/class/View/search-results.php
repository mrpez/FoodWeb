<?php

	include(dirname(__FILE__) . '/class/Controller/SearchController.php');
	$SearchController = new SearchController;
	
	echo '<pre>';
	$tester =($SearchController->getNearbyZipCodes('17403', '5'));
	
	$detailedarray = $tester->{'zip_codes'};
	$zips = array();
	
	for($i = 0; $i < count($detailedarray); $i++) 
	{
		$zips[] =  $detailedarray[$i]->{'zip_code'};
	}
	var_dump($zips);
	echo '</pre>';
?>