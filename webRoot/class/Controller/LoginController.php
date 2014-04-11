<?php

	if( !class_exists('Login') ) {
		include(dirname(__FILE__) . '/../model/Login.php');
		$Login = new Login;
	}
	
	class LoginController extends Login {
	
		function __construct() {
			// Call Login's constructor
			parent::__construct();
			
			// Check if a session has been started (this needs done for each page load)
			if( session_id() == null )
				session_start();
			
			if(	array_key_exists('user_id', $_SESSION)
				&& array_key_exists('UUID', $_COOKIE)
				&& $_COOKIE['UUID'] == $this->hashKey($_SESSION['user_id'])
			) {
				$this->setUserIndex($_SESSION['user_id']);
			}
		}
		
		public function hashKey($in) {
			return md5('234' . $in . 'jksdlhfk987(*');
		}
	
		public function login($email, $password) {
			$DB = Utility::getDB();
			
			// Hash the password
			$password = Utility::hashPassword($password);
			
			$qryLogin = $DB->verifyLogin($password, $email);
						
			// Successful login, create user session
			if( $qryLogin !== false ) {
				// Save their user index
				$this->setUserIndex($qryLogin);
				$_SESSION['user_id'] = $this->getUserIndex();
				// Set their login expiration to two weeks from now
				setcookie('UUID', $this->hashKey($this->getUserIndex()), (time()+60*60*24*14));
			}
		}
	
		public function logout() {
			if( array_key_exists('UUID', $_COOKIE) ) {
				// Blank the cookie and set it to expire right now
				setcookie('UUID', '', time());
			}
			
			if( array_key_exists('user_id', $_SESSION) ) {
				unset($_SESSION['user_id']);
			}
			
			$this->setLoginStatus(false);
		}
	
	}
	
?>