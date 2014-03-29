<?php

	echo 'Starting User Model Test...<hr />';
	
	include(dirname(__FILE__) . '/../class/Model/User.php');
	$User = new User;
	
	echo 'Testing Logged In Attribute<br />';
		
	$errorCount = 0;
	$testCount = 0;
	
	{
		$testCount++;
		$User->setUserStatus(true);
		if($User->setUserStatus() == true) {
			echo 'Passed... <br />';
		} else {
			$errorCount++;
			echo 'Failed... <br />';
		}
	}
	
	$testCount++;
	$User->setUserStatus(false);
	if($User->getUserStadus() == false) {
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
	if($User->getUserIndex() == false) {
		echo 'Passed... <br />';
	} else {
		$errorCount++;
		echo 'Failed... <br />';
	}
	
	$testCount++;
	$User->setUserIndex(12456);
	$User->setUserStatus(true);
	
	if($User->getUserStadus() == 12456) {
		echo 'Passed... <br />';
	} else {
		$errorCount++;
		echo 'Failed... <br />';
	}
	
	$testCount++;
	$User->getUserStadus(false);	
	if($User->getUserStadus() == false) {
		echo 'Passed... <br /><br />';
	} else {
		$errorCount++;
		echo 'Failed... <br /><br />';
	}
	echo (($errorCount/$testCount) * 100) . '% Error Rate (' . $errorCount . '/' . $testCount . ')<hr />';



?>