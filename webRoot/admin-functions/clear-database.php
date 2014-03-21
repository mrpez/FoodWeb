<?php

	include('../class/Utility.php');
	$Utility = new Utility;
	
	$dbCon = $Utility->genericGetPDO();
	echo '<pre>';
	
	$query = $dbCon->prepare("DROP DATABASE test_db");
	if(!$query->execute())
		var_dump($query->errorInfo());
	echo '</pre>';
		
	echo '<hr />Done!';

?>