<?php
	
	include(dirname(__FILE__) . '/class/Utility.php');
	$Utility = new Utility;
	
	$PDODB = $Utility->getPDO();
	
	echo '<pre>';
	
	var_dump(session_id());
	var_dump(session_id() == null);
	
	session_start();
	
	var_dump(session_id());
	
	// Hash the password
	$password = $Utility->hashPassword('test');
	
	$email = 'mlopez6@ycp.edu';
	
	var_dump($email);
	var_dump($password);
	
	
	$query = $PDODB->prepare("SELECT U.id, U.*, UP.*
							  FROM users U
							  INNER JOIN user_passwords UP
								ON U.id = UP.user_id
								AND UP.password = :password
							  WHERE U.email = :email");
	$query->bindParam(':password', $password);
	$query->bindParam(':email', $email);
	
	if( !$query->execute() ) {
		Utility::throwError($query->errorInfo());
		return false;
	}
	
	$qryLogin = $query->fetchAll();
	
	var_dump($qryLogin);

?>