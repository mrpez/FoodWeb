<?php

	include(dirname(__FILE__) . '/../Controller/SearchController.php');
	$SearchController = new SearchController;
	$checkvalid = false;
	
	if( array_key_exists('zipcode', $_POST) ) {

		if( strlen($_POST['zipcode']) != 5)
			$errorString .= 'Please provide your zipcode it the correct format.<br />';
			
		if( strlen($errorString) == 0 ) {  
			$showForm = false;
			$checkvalid = true;
		}
	}
	
	if($checkvalid == true){
		echo '<pre>';
		$tester = $SearchController->getNearbyZipCodes($_GET['zipcode'], $_GET['radiusofsearch']);
		
		$detailedarray = $tester->{'zip_codes'};
		$zips = array();
		
		for($i = 0; $i < count($detailedarray); $i++) 
		{
			$zips[] =  $detailedarray[$i]->{'zip_code'};
		}
		var_dump($zips);
		echo '</pre>';
	}
?>