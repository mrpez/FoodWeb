<?php
	
	if( !array_key_exists('view', $_GET) ) {
		$_GET['view'] = '';
	}
	
	
	if( file_exists(dirname(__FILE__) . '/class/View/' . $_GET['view'] . '.php') ) {
		if( file_exists(dirname(__FILE__) . '/class/PreView/' . $_GET['view'] . '.php') )
			include(dirname(__FILE__) . '/class/PreView/' . $_GET['view'] . '.php');
			
		include(dirname(__FILE__) . '/header.php');
		include(dirname(__FILE__) . '/class/View/' . $_GET['view'] . '.php');
		include(dirname(__FILE__) . '/footer.php');	
	} else {		
		header('Location: /');
		die;	
	}
	
?>