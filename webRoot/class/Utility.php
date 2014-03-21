<?php
class Utility
{
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
			//$error = $e->getMessage();
			//var_dump($error);
			//Utility::throwError(1, '', $error, true);
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
	
}
?>