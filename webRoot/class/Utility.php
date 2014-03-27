<?php
class Utility
{
	private $PDODB = null;
		
	public function getPDO() {
		$dbCredentials = array(1);
		$dbCredentials[ 'server' ] = '127.0.0.1';
		$dbCredentials[ 'database' ] = 'test_db';
		$dbCredentials[ 'u' ] = 'root';
		$dbCredentials[ 'p' ] = '';
		
		try {
			if( !isSet($PDODB) )
			{
				$PDODB = new PDO("mysql:host=" . $dbCredentials[ 'server' ] . ";dbname=" . $dbCredentials[ 'database' ], $dbCredentials[ 'u' ], $dbCredentials[ 'p' ]);
			}
		} catch (PDOException $e) {
			$this->throwError($e->getMessage());
			die;
		}
		
		return $PDODB;
	}
	
	public function genericGetPDO() {
		$dbCredentials = array(1);
		$dbCredentials[ 'server' ] = '127.0.0.1';
		$dbCredentials[ 'database' ] = '';
		$dbCredentials[ 'u' ] = 'root';
		$dbCredentials[ 'p' ] = '';
		
		try {
			if( !isSet($PDODB) )
			{
				$PDODB = new PDO("mysql:host=" . $dbCredentials[ 'server' ] . ";dbname=" . $dbCredentials[ 'database' ], $dbCredentials[ 'u' ], $dbCredentials[ 'p' ]);
			}
		} catch (PDOException $e) {
			$error = $e->getMessage();
			Utility::throwError(1, '', $error, true);
		}
		
		return $PDODB;
	}
	
	
	public function throwError($details) {
		echo '<pre>
				' . nl2br($details) . '
			  </pre>';
	}
}
?>