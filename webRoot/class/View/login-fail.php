<?php
	
	if( !class_exists('UserController') ) {
		include(dirname(__FILE__) . '/../UserController.php');
		$UserController = new UserController;
	}
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
				
		// Get the last id from the above query
			$user_id = $PDODB->lastInsertId();
			$resetkey = Utility::getrandomhash();
		
		// Now store their key
		$query = $PDODB->prepare("INSERT INTO user_resetkey
									 (
									user_id
									, resetkey
									 )
									 VALUES
									 (
									:user_id
									, :resetkey
									 )");
		$subject = "Reset password"
		$message  = " Your reset verification key is '$resetkey'. Click link <a href="https://www.foodweb/loginreset.fw">here</a> to reset id.";
		echo:"A reset key has been sent to '$email' please go to link in email and use given key to reset.";
		
		bool mail ($email , $subject ,  $message [, string $additional_headers [, string $additional_parameters ]] );
	
	
	?>	
