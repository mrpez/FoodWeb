<?php

	if( !class_exists('Login') ) {
		include(dirname(__FILE__ . '/../model/Login.php'));
		$Login = new Login;
	}
	
	class LoginController extends Login {
	
		public function login($username, $password) {
			
		}
	
	}
	
?>