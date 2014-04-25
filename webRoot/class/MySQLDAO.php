<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/Utility.php');
		$Utility = new Utility;
	}
	
	class MySQLDAO extends Utility {
		
		private $DBC = null;
		
		public function addUser($name, $email, $password) {
			$PDODB = $this->getPDO();
			
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
			
			return true;
		}
		
		function checkEmail($email) {
			$PDODB = $this->getPDO();
			
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
			$qryResults = $query->fetchAll();
			if( count($qryResults) )
				return $qryResults[0]['id'];
				
			return false;
		}
		
		public function verifyLogin($password, $email) {
			$PDODB = $this->getPDO();
		
			$query = $PDODB->prepare("SELECT U.id
									  FROM users U
									  INNER JOIN user_passwords UP
										ON U.id = UP.user_id
										AND UP.password = :password
									  WHERE email = :email;");
			$query->bindParam(':password', $password);
			$query->bindParam(':email', $email);
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$qryResults = $query->fetchAll();
			
			if( count($qryResults) ) {
				return $qryResults[0]['id'];
			}
			
			return false;
		}
		/*
		public function currentHours($vendorid) {
			$PDODB = $this->getPDO();
			$query->bindParam(':vendorid', $vendorid);
		
			$query = $PDODB->prepare("SELECT day_of_week
											, opening_time
											, closing_time
									  FROM vendor_hours
									  WHERE vendor_id = vendorid;");
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$qryResults = $query->fetchAll();
			
			if( count($qryResults) ) {
				return $qryResults[0]['id'];
			}
			
			return false;
		}
		*/
		
	}

?>