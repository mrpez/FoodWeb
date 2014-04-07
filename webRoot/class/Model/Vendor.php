<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class Vendor extends Utility {
		
		private $isVendor;
		private $vendorName;
		private $vendorId;
		
		function __construct() {
			$this->isVendor = false;
			$this->vendorName = 'Test Vendor';
			$this->vendorId = null;
		}
		
		public function getVendorName() {
			return $this->vendorName;
		}
		
		public function getVendorid(){
			return $this->vendorId;
		}
	}
	
?>