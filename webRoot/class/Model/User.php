<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class User extends Utility {
		
		function __construct($user_index = false) {
			if( $user_index == false ) {
				Utility::throwError('No User Index supplied to User Model');
			}
		}
		public function getUserStadus() {
			return $this->userIsIn;
		}
		
		public function getUserIndex() {
			if( $this->userIsIn != true ) {
				return false;
			}
			return $this->userIndex;
		}
		
		public function setUserStatus($userStatus = true) {
			$this->userIsIn = $userStatus;
		}
		public function setUserIndex($userIndex = false) {
			$this->userIndex = $userIndex;
		}
		
	}
	
?>