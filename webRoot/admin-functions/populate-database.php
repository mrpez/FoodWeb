<?php

	if( !class_exists('Utility') ) {
		include('../class/Utility.php');
		$Utility = new Utility;
	}
	
	$dbCon = $Utility->genericGetPDO();
	echo '<pre>';
	
	$query = $dbCon->prepare("CREATE DATABASE foodweb;");
	if(!$query->execute())
		var_dump($query->errorInfo());
		
	
	$dbCon = $Utility->getPDO();
	
	$query = $dbCon->prepare("CREATE TABLE users
							  (
								id integer auto_increment not null primary key
								, name varchar(100)
								, email integer unique
							  )");
	if(!$query->execute())
		var_dump($query->errorInfo());
		
		
	
	$query = $dbCon->prepare("CREATE TABLE user_passwords
							  (
								id integer auto_increment not null primary key
								, user_id integer
								, password varchar(255)
								, Foreign Key (user_id) references users(id)
							  )");
	if(!$query->execute())
		var_dump($query->errorInfo());
		
	echo '</pre>';
		
	echo '<hr />Done!';

?>