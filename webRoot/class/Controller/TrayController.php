<?php
	
	if( !class_exists('Tray') ) {
		include(dirname(__FILE__) . '/../model/Tray.php');
		$Tray = new Tray;
	}
	class UserController extends Tray {
	
		public function getItems{
		$DB = Utility::getDB();
		
		
		
		}
			

	
	}
?>