<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	
	class Menu extends Utility {
		private $menuId;
		private $name;
		
		public function setMenuId($menu_id) {
			$this->menuId = $menu_id;
			return true;
		}
		public function setName($name) {
			$this->name = $name;
			return true;
		}
		
		public function getMenuId() {
			return $this->menuId;
		}
		public function getName() {
			return $this->name;
		}
		
		public function getChildren($element_id) {
			$DB = Utility::getDB();
			
			return $DB->getMenuChildren($this->getMenuId(), $element_id);
		}
		
		
		
	}

?>