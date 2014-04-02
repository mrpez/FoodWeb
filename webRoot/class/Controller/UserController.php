<?php
	
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class UserController extends Utility {
		
		public function registerUser($email, $name, $password) {
			$PDODB = Utility::getPDO();
			
			// Check if email already exists in DB
			$query = $PDODB->prepare("SELECT id
									  FROM users
									  WHERE email = :email;");
			$query->bindParam(':email', $email);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// If it exists, fail
			if( count($query->fetchAll()) )
				return false;
			
			// Add user to database
			$query = $PDODB->prepare("INSERT INTO users
									  (
										name
										, email
									  )
									  VALUES
									  (
										:name
										, :email
									  )");
			$query->bindParam(':name', $name);
			$query->bindParam(':email', $email);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// Get the last id from the above query
			$user_id = $PDODB->lastInsertId();
			
			// Hash the password
			$password = Utility::hashPassword($password);
			
			// Now store their password
			$query = $PDODB->prepare("INSERT INTO user_passwords
									  (
										user_id
										, password
									  )
									  VALUES
									  (
										:user_id
										, :password
									  )");
			$query->bindParam(':user_id', $user_id);
			$query->bindParam(':password', $password);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// Finally return true;
			return true;
		}
		
		public function hashPassword($password) {
			return md5('asdfasd23@#@#SDAF' . $password . '232ssdds**&^^');
		}
		
	}
	
?>