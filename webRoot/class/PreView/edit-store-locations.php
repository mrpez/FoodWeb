<?php
	if( !class_exists('VendorController') ) {
		include(dirname(__FILE__) . '/../Controller/VendorController.php');
		$VendorController = new VendorController;
	}
	
	$errorString = '';
	$showForm = true;
	var_dump($_POST);
	$existing_store_locations = $VendorController->get_store_locations();
	
	if( array_key_exists('address', $_POST) ) {

		if( strlen($_POST['address']) < 7 ||  strlen($_POST['address']) > 100)
			$errorString .= 'Please provide your address in a valid format: #StreetNumber StreetName Identifier.<br />';
			
		if( strlen($_POST['zipcode']) != 5)
			$errorString .= 'Please provide your zipcode it the correct format.<br />';
			
		if( strlen($errorString) == 0 ) {  
			!$VendorController->add_store_locations($_POST['address'], $_POST['zipcode']);
			$showForm = false;
			
		}
	}
	
	
?>