<?php

	echo '<br /><h3>Starting Login Model Test...</h3><hr />';
	
	include(dirname(__FILE__) . '/../class/Model/Login.php');
	$Login = new Login;
	
	echo 'Testing Logged In Attribute<br />';
		
	$errorCount = 0;
	$testCount = 0;
	
	{
		$testCount++;
		$Login->setLoginStatus(true);
		if($Login->getLoginStatus() == true) {
			echo 'Passed... <br />';
		} else {
			$errorCount++;
			echo 'Failed... <br />';
		}
	}
	
	$testCount++;
	$Login->setLoginStatus(false);
	if($Login->getLoginStatus() == false) {
		echo 'Passed... <br /><br />';
	} else {
		$errorCount++;
		echo 'Failed... <br /><br />';
	}
	echo (($errorCount/$testCount) * 100) . '% Error Rate (' . $errorCount . '/' . $testCount . ') <hr />';
	
	echo 'Testing User Index Attribute<br />';
	
	$errorCount = 0;
	$testCount = 0;
	
	$testCount++;
	if($Login->getUserIndex() == false) {
		echo 'Passed... <br />';
	} else {
		$errorCount++;
		echo 'Failed... <br />';
	}
	
	$testCount++;
	$Login->setUserIndex(12456);
	$Login->setLoginStatus(true);
	
	if($Login->getLoginStatus() == 12456) {
		echo 'Passed... <br />';
	} else {
		$errorCount++;
		echo 'Failed... <br />';
	}
	
	$testCount++;
	$Login->setLoginStatus(false);	
	if($Login->getLoginStatus() == false) {
		echo 'Passed... <br /><br />';
	} else {
		$errorCount++;
		echo 'Failed... <br /><br />';
	}
	echo (($errorCount/$testCount) * 100) . '% Error Rate (' . $errorCount . '/' . $testCount . ')<hr />';



?>