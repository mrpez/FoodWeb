<?php
	$result = '';
	
	if( array_key_exists('db_type', $_POST) ) {
		if( $_POST['db_type'] ) {
			setcookie('db_type', 'persistent', (time()+60*60*24*14));
		} else {
			setcookie('db_type', 'mysql', (time()+60*60*24*14));		
		}
		
		if( !session_id() )
			session_start();
			
		$_SESSION = array();
		
		//session_destroy();
		
		$result = 'Updated!';
	}
	
?>