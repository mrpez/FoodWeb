<?php

	if( !array_key_exists('method', $_POST) )
		$_POST['method'] = '';

	switch($_POST['method']) {
		
		case 'getMenu':
			
			$arrRet = array();
			$arrRet['returnStatus'] = 1;
			$arrRet['returnString'] = 'Invalid Method Specified';
			echo json_encode($arrRet);
			break;
		
		default:
			$arrRet = array();
			$arrRet['returnStatus'] = 1;
			$arrRet['returnString'] = 'Invalid Method Specified';
			echo json_encode($arrRet);
			break;
	}

?>