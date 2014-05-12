<?php

	if( !class_exists('MenuController') ) {
		include(dirname(__FILE__) . '/../controller/MenuController.php');
	}
	
	if( !array_key_exists('menuId', $_GET) ) {
		header('Location: /');
		die;
	}
	
	if( !array_key_exists('elementId', $_GET) )
		$_GET['elementId'] = 0;
	
	$thisMenu = new MenuController($_GET['menuId']);
	
	$menuItems = $thisMenu->getChildren($_GET['elementId']);
	
?>