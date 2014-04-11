<?php
class Utility
{
	private $PDODB = null;
	private $DBObj = null;
		
	public function getDB() {
		if( $this->DBObj == null ) {
			include(dirname(__FILE__) . '/PersistentDAO.php');
			$this->DBObj = new PersistentDAO;
		}
	
		return $this->DBObj;
	}
	
	public function getPDO() {
		$dbCredentials = array(1);
		$dbCredentials[ 'server' ] = '127.0.0.1';
		$dbCredentials[ 'database' ] = 'foodweb';
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
				' . var_dump($details) . '
			  </pre>';
	}
	
		
	public function hashPassword( $password ) {
		return md5( 'a t4&P(*#' . $password );
	}
	
	public function getRandomHash() {
		return md5( 'adsfh 2389dsf2:[s09' . date('r') . (4 * date('i')) );
	}
	
	public function sanitizeString( $string ) {
		return htmlspecialchars( $string );
	}
	
	public function cleanDatabaseTimestamp( $timestamp, $displayDepth = 3 ) {
		//This assumes that the database uses PST timezone and converts to EST
		$thisTime = strtotime($timestamp);
		$thisTime += 10800;
		
		switch($displayDepth) {
			case 1:					
				return date('M jS, Y', $thisTime);
			case 2:
				return date('D, M jS, Y', $thisTime);
			default:
				return date('D, M jS, Y \a\t g:ia', $thisTime);
		}
	}
	
	public function getTempDir() {
		return sys_get_temp_dir() . '/';
	}
}
?>