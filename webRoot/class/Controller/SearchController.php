<?php

	if( !class_exists('Search') ) {
		include(dirname(__FILE__) . '/../Model/Search.php');
		$Search = new Search;
	}
	
	class SearchController extends Search {

		public function getNearbyZipCodes($inputZip, $radiusInMiles) {
			$response = fopen('http://zipcodedistanceapi.redline13.com/rest/B2VUEeOhL6PMqtKKi6MSJVTPhnfVWdIygDsUShcEn1qOvazNhlG0gzQxX6sUjbsz/radius.json/' . $inputZip . '/' . $radiusInMiles . '/mile', 'r');
			$response = stream_get_contents($response);
			$response = json_decode($response);
			return $responce;
		}
		
	}
	
?>