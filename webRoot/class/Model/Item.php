<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	echo 'this is the item!';
	class item extends Utility {
		private $itemName = array(1);
		
		//a new item is added
		public function setItems($x){
			 $this->itemName[] = $x;
		}
		//send item information to the menu
		public function sendItemstoMenu(){
			return $this->itemName;
		}	
	}

?>