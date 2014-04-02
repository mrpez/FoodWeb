<?php
	
	if( !class_exists('Utility') ) {
		include('../class/Utility.php');
		$Utility = new Utility;
	}
	
	$dbCon = $Utility->genericGetPDO();
	echo '<pre>';
	
	$query = $dbCon->prepare("DROP DATABASE foodweb");
	if(!$query->execute())
		var_dump($query->errorInfo());
	echo '</pre>';
		
	echo '<hr />Done!';
	
	include('populate-database.php');

?>