<?php
	
	if( !class_exists('Tray') ) {
		include(dirname(__FILE__) . '/../model/Tray.php');
		$Tray = new Tray;
	}
	class UserController extends Tray {
	
		public function getItem($item_id, $quantity){
		$DB = Utility::getDB();
			
		return $DB->getItems($this->getTrayId());
		
		}
			

	
	}
?>