<?php
	
	if( !class_exists('VendorController') ) {
		include(dirname(__FILE__) . '/../controller/VendorController.php');
	}
	if( !class_exists('SearchController') ) {
		include(dirname(__FILE__) . '/../controller/SearchController.php');
		$SearchController = new SearchController;
	}
	
	if( !array_key_exists('vendorId', $_GET) )
		$_GET['vendorId'] = 0;
	
	$thisVendor = new VendorController($_GET['vendorId']);
	$locationInfo = $thisVendor->getLocationInfo($_GET['locationId']);
	$cityInfo = $SearchController->getCityState($locationInfo['zipcode']);
	
	$menus = $thisVendor->getMenus();
	
?>