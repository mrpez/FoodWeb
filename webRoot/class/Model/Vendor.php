<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class Vendor extends Utility {
		
		private $isVendor;
		private $vendorName;
		
		function __construct() {
			$this->isVendor = false;
			$this->vendorName = 'Test Vendor';
		}
		
		public function getVendorName() {
			return $this->vendorName;
		}
		
	}
	
?>