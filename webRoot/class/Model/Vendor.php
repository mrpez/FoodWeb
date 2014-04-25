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
			$this->vendorName = null;
			$this->vendorId = null;
		}
		
		public function getVendorName() {
			if( $this->isVendor ) {
				if( $this->vendorName == null ) {
					VendorController::populateVendorName();
				}
				return $this->vendorName;
			}
			
			return false;
		}
		
		public function getVendorId(){
			if( $this->isVendor ) {
				return $this->vendorId;
			}
			return false;
		}
		
		public function isVendor() {
			return $this->isVendor;
		}
		
		public function setVendorId($vendor_id) {
			$this->isVendor = true;
			$this->vendorId = $vendor_id;
			return true;
		}
		
		public function setVendorName($vendor_name) {
			$this->vendorName = $vendor_name;
			return true;
		}
	}
	
?>