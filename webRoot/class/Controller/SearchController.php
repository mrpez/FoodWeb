<?php

	if( !class_exists('Search') ) {
		include(dirname(__FILE__) . '/../Model/Search.php');
		$Search = new Search;
	}
	
	class SearchController extends Search {
		
		public function getNearbyZipCodes($inputZip, $radiusInMiles) {
			$response = fopen('http://zipcodedistanceapi.redline13.com/rest/sEugTvJ4a7XmdaFilRVLH5urbqwbWtcp8HG1cp6nx4KLfp4AhZmZ5RrhhXserFDA/radius.json/' . $inputZip . '/' . $radiusInMiles . '/mile', 'r');
			$response = stream_get_contents($response);
			$response = json_decode($response);
			return $response;
		}
		
	}
	
?>