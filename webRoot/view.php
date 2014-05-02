<?php
	
	$vars = explode('?', $_SERVER['REQUEST_URI']);
	
	if( count($vars) > 1 ) {
		$vars = explode('&', $vars[1]);
		for($i = 0; $i < count($vars); $i++) {
			$thisVar = explode('=', $vars[$i]);
			if( count($thisVar) > 1 ) {
				$_GET[$thisVar[0]] = $thisVar[1];
			}
		}
	}
	
	if( !array_key_exists('view', $_GET) || $_GET['view']=='') {
		$_GET['view'] = 'home';
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