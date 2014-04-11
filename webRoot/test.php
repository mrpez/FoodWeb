<?php
	echo '<pre>';
	var_dump($_GET);
	die;
	
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
	
	
	$query = $PDODB->prepare("SELECT * FROM users WHERE email = 'test'");
	
	if( !$query->execute() ) {
		Utility::throwError($query->errorInfo());
		return false;
	}
	
	$qryLogin = $query->fetchAll();
	
	var_dump($qryLogin);

?>