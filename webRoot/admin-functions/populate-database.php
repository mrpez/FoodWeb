<?php

	include('../class/Utility.php');
	$Utility = new Utility;
	
	$dbCon = $Utility->genericGetPDO();
	echo '<pre>';
	
	$query = $dbCon->prepare("CREATE DATABASE test_db;");
	if(!$query->execute())
		var_dump($query->errorInfo());
		
	
	$dbCon = $Utility->getPDO();
	
	$query = $dbCon->prepare("CREATE TABLE test
							  (
								name varchar(100)
								, number integer
								, jordan decimal(10,2)
							  )");
	if(!$query->execute())
		var_dump($query->errorInfo());
		
	echo '</pre>';
		
	echo '<hr />Done!';

?>