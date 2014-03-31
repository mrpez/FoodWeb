<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class User extends Utility {
	
		private $email;
		private $name;
		private $photo_location;
		
		function __construct($user_index = false) {
			if( $user_index == false ) {
				Utility::throwError('No User Index supplied to User Model');
			}
		}
		public function getEmail() {
			return $this->email;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getPhoto() {
			return $this->photo_location;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function setName($name) {
			$this->name = $name;
		}
		
		public function setPhoto($photo_location) {
			$this->photo_location = $photo_location;
		}
		
	}
	
?>