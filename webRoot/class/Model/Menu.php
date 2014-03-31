<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	echo 'this is the menu!';
	class Menu extends Utility {
		private $menu;
		private $menuItems = array(1);
		private $menuSides = array(1);
		
		//get items from database and populate menuItems array
		public function getMenuItems($x){
			$this->menuItems[] = $x;
		}
		//get sides from database and populate menuSides array
		public function getMenuSideItems($x){
			$this->menuSides[] = $x;
		}
		//allow vendor to add items to the data
		public function setMenuItems(){
			 return $this->menuItems;
		}
		//allow vendor to add sides to the data
		public function setMenuSides(){
			 return $this->menuSides;
		}
		

		
		
		
	}

?>