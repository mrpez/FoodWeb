<?php

	include('/class/Utility.php');
	$Utility = new Utility;
	
	$dbCon = $Utility->getPDO();
	
	$query = $dbCon->prepare("CREATE DATABASE test_db;");
	$query->execute();
	
	$query = $dbCon->prepare("SELECT jordan, number
							  FROM test;");
	if( !$query->execute() ) {
		$query = $dbCon->prepare("CREATE TABLE test
								  (
									name varchar(100)
									, number integer
									, jordan decimal(10,2)
								  )");
		if(!$query->execute())
			var_dump($query->errorInfo());
	}
	$query = $dbCon->prepare("INSERT INTO test
							  (
								name
								, number
								, jordan
							  )
							  VALUES
							  (
								'Ryan'
								, '123456789'
								, '10.25'
							  );");
	$query->execute();
	$query = $dbCon->prepare("SELECT jordan, number
							  FROM test;");
	$query->execute();
	$results = $query->fetchAll();
	
	echo '<pre>';
	var_dump($results);
	echo '</pre>';
	
	echo 'Connected!';

?>