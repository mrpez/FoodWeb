<?php
	
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class UserController extends Utility {
		
		public function registerUser($email, $name, $password) {
			$DB = Utility::getDB();
			
			$emailExists = $DB->checkEmail($email);
			
			if( $emailExists != false )
				return false;		
			
			// Hash the password
			$password = Utility::hashPassword($password);
			
			$DB->addUser($name, $email, $password);
			
			// Finally return true;
			return true;
		}
		
		//--------Forgotten Pass------------	
		public function forgotPass($email){
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
				
			// If it doesn't exist, fail
			if( count($query->fetchAll()) == 0 )
					return false;
					
			// Get the last id from the above query
				$user_id = $PDODB->lastInsertId();
				$resetkey = Utility::getRandomHash();
			
			// Now store their key
			$query = $PDODB->prepare("INSERT INTO user_resetkey
										 (user_id,
										 resetkey
										 )
										 VALUES
										 (:user_id,
										 :resetkey
										 )");
			$query->bindParam(':user_resetkey', $resetkey);

			if(!$query->execute()) {
					Utility::throwError($query->errorInfo());
					return false;
			}
			$subject = "Reset password";
			$message  = " Your reset verification key is " . $resetkey . ". Click link <a href=\"https://www.foodweb/loginreset.fw?resetKey=" . $resetkey . "\">here</a> to reset id.";
			mail($_POST['email'], $subject ,  $message);
		}
		
		public function hashPassword($password) {
			return md5('asdfasd23@#@#SDAF' . $password . '232ssdds**&^^');
		}
		
		public function editUserSettings($userIndex ,$visname, $adrl1, $city, $state){
			$PDODB = Utility::getPDO();
			
			$query = $PDODB->prepare("INSERT INTO user_settings
										 (user_id,
										 visible_name,
										 address_line_one,
										 city,
										 state
										 )
										 VALUES
										 (:user_id,
										 :visiblename,
										 :address_line_one,
										 :city,
										 :state
										 )");
			$query->bindParam(':user_id', $userIndex);
			$query->bindParam(':visiblename', $visname);
			$query->bindParam(':address_line_one', $adrl1);
			$query->bindParam(':city', $city);
			$query->bindParam(':state', $state);
			
			if(!$query->execute()) {
					Utility::throwError($query->errorInfo());
					return false;
			}
		}
		
	}
?>