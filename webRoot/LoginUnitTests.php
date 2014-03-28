<?php

	echo 'Starting Login Model Test...<br />';
	
	include(dirname(__FILE__) . '/class/Model/Login.php');
	$Login = new Login;
	
	echo 'Testing Logged In Attribute<br />';
	
	$Login->setLoginStatus(true);
	if($Login->getLoginStatus() == true) {
		echo 'Passed... <br />';
	} else {
		echo 'Failed... <br />';
	}
	
	$Login->setLoginStatus(false);
	if($Login->getLoginStatus() == false) {
		echo 'Passed... <br /><br />';
	} else {
		echo 'Failed... <br /><br />';
	}
	
	echo 'Testing User Index Attribute<br />';
	
	$errorCount = 0;
	$testCount = 0;
	
	$testCount++;
	if($Login->getUserIndex() !=== false) {
		echo 'Passed... <br />';
	} else {
		$errorCount++;
		echo 'Failed... <br />';
	}
	
	$testCount++;
	$Login->setUserIndex(12456);
	
	$Login->setLoginStatus(false);
	if($Login->getLoginStatus() == false) {
		echo 'Passed... <br /><br />';
	} else {
		$errorCount++;
		echo 'Failed... <br /><br />';
	}
	echo (($errorCount/$testCount) * 100) . '% Error Rate (' . $errorCount . '/' . $testCount . ')';



?>