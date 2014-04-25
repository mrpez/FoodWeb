<?php

	if( !class_exists('Menu') ) {
		include(dirname(__FILE__) . '/../Model/Menu.php');
		$Menu = new Menu;
	}
	
	class MenuController extends Menu {
		
		public function getMenu($vendorId = null) {
			if( $vendorId == null ) {
				throw('Error');
			}
			
			$DB = $this->getDB();
			
			$menu = $DB->getMenuByVendor($vendorId);
			
		}
		
	}
	
?>