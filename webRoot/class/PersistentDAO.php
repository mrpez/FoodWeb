<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/Utility.php');
		$Utility = new Utility;
	}
	
	class PersistentDAO extends Utility {
		
		function __construct() {
			if( !session_id() ) {
				session_start();
			}
			
			if( !array_key_exists('persistentDB', $_SESSION) ) {
				$_SESSION['persistentDB'] = array();				
				$_SESSION['persistentDB']['users'] = array();
				$_SESSION['persistentDB']['user_passwords'] = array();
			}
		}
		
		function addUser($name, $email, $password) {
			// Create user 'row'
			$tempArray = array();
			$tempArray['name'] = $name;
			$tempArray['email'] = $email;
			
			// Add row to 'table'
			$_SESSION['persistentDB']['users'][] = $tempArray;
			
			// Get index of our new user
			$user_id = count($_SESSION['persistentDB']['users'])-1;
			
			// Create Password row
			$tempArray = array();
			$tempArray['user_id'] = $user_id;
			$tempArray['password'] = $password;
			
			// Add to passwords table
			$_SESSION['persistentDB']['user_passwords'][] = $tempArray;
			
			return true;
		}
		
		function checkEmail($email) {
			$email = strtolower(rtrim(ltrim($email)));
			
			for($i = 0; $i < count($_SESSION['persistentDB']['users']); $i++) {
				if( strtolower(rtrim(ltrim($_SESSION['persistentDB']['users'][$i]['email']))) == $email )
					return $i;
			}
			
			return false;
		}
		
		function verifyLogin($password, $email) {
			$emailIndex = $this->checkEmail($email);
			
			if( $emailIndex === false ) {
				return false;
			}
				
			for($i = 0; $i < count($_SESSION['persistentDB']['user_passwords']); $i++) {
				if( $_SESSION['persistentDB']['user_passwords'][$i]['user_id'] == $emailIndex 
					&& $_SESSION['persistentDB']['user_passwords'][$i]['password'] == $password )
					return $emailIndex;
			}
			
			return false;
			
		}
		
	}

?>