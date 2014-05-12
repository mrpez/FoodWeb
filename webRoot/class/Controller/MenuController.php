<?php

	if( !class_exists('Menu') ) {
		include(dirname(__FILE__) . '/../Model/Menu.php');
		$Menu = new Menu;
	}
	
	class MenuController extends Menu {
	
		public function __construct($menu_id = null) {
			if( $menu_id == null )
				throw('No Menu Id');
				
			$this->setMenuId($menu_id);
			$this->populateMenuName();
		}
		
		public function addMenuCategory($parent_left_pointer, $category_name, $menu_id = null) {
			$DB = Utility::getDB();
			
			if($menu_id == null)
				$menu_id = $this->getMenuId();
			
			return $DB->addMenuCategory($menu_id, $parent_left_pointer, $category_name);
		}
		
		public function addProduct($menu_id, $parentLeftPointer) {
			$DB = Utility::getDB();
			
			return $DB->addProduct($menu_id, $parentLeftPointer);			
		}
		
		public function getMenu($vendorId = null) {
			if( $vendorId == null ) {
				throw('Error');
			}
			
			$DB = $this->getDB();
			
			$menu = $DB->getMenuByVendor($vendorId);
			
		}
		
		private function populateMenuName() {
			$DB = $this->getDB();
			
			$this->setName($DB->getMenuName($this->getMenuId()));
			
			return true;
		
		}
		
	}
	
?>