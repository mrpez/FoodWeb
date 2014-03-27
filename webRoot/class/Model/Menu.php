<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class Menu extends Utility {
		
		private $categories;
		private $
		
		function __construct() {
			$this->isLoggedIn = false;	
		}		
		
		public function getLoginStatus() {
			return $this->isLoggedIn;
		}
		
		public function setLoginStatus($loginStatus = false) {
			$this->$loginStatus = $loginStatus;
		}
		
	}

?>