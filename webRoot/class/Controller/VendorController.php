<?php
	
	if( !class_exists('Vendor') ) {
		include(dirname(__FILE__) . '/../Model/Vendor.php');
		$Vendor = new Vendor;
	}
	
	class VendorController extends Vendor {
	
		public function __construct($vendorId = null) {
			$DB = Utility::getDB();
			
			if( !class_exists('LoginController') )
				include(dirname(__FILE__) . '/LoginController.php');
			if( !isSet($LoginController) )
				$LoginController = new LoginController;
			
			if( $vendorId == null ) {
				$user_id = $LoginController->getUserIndex();
				if( $user_id !== false ) {
					$result = $DB->checkIfUserIsVendor($user_id);
					if( $result !== false ) {
						$this->setVendorId($result);
					}
				}
			} else {
				$this->setVendorId($vendorId);
			}
			
			$this->populateVendorName();
		}
		
		private function getVendorInfo($vendorId) {
			$DB = $this->getDB();
			
			return $DB->getVendorInfo($vendorId); 
		}
		
		public function getLocationInfo($locationId) {
			$DB = $this->getDB();
			
			return $DB->getVendorLocationInfo($this->getVendorId(), $locationId); 
		}
		
		public function addMenu($menuName, $vendorId = null) {
			if( $vendorId == null ) {
				// Get our vendor id
				if( $vendorId == null ) {
					$vendorId = $this->getVendorId();
					if( $vendorId === false ) {
						return false;
					}
				}
				
				// Get our DAO
				$DB = Utility::getDB();
				
				return $DB->addMenu($menuName, $vendorId);
			}
		}
		
		public function getMenus() {
			$DB = Utility::getDB();
			
			return $DB->getVendorMenus($this->getVendorId());			
		}
		
		public function populateVendorName() {
			if( $this->isVendor() ) {
				$DB = Utility::getDB();
				$vendorName = $DB->getVendorName($this->getVendorId());
				$this->setVendorName($vendorName);
			}
			return false;
		}
		
		public function promoteUserToVendor($user_id, $vendor_name) {
			$PDODB = Utility::getPDO();
						
			$query = $PDODB->prepare("INSERT INTO vendors
									  (
										owner_id
										, name
									  )
									  VALUES
									  (
										:owner_id
										, :name
									  );");
			$query->bindParam(':owner_id', $user_id);
			$query->bindParam(':name', $vendor_name);
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
		}
		
		public function add_hours($day, $opening_time, $closing_time, $vendor_id = NULL){
			if($vendor_id == NULL){
				$vendor_id = $this->getVendorid();
				}
				
			$PDODB = Utility::getPDO();
			$query = $PDODB->prepare("INSERT INTO vendor_hours
									  (
										day_of_week
										, opening_time
										, closing_time
										, vendor_id
									  )
									  VALUES
									  (
										:day_of_week
										, :opening_time
										, :closing_time
										, :vendor_id
									  );");
			$query->bindParam(':day_of_week', $day);
			$query->bindParam(':opening_time', $opening_time);
			$query->bindParam(':closing_time', $closing_time);
			$query->bindParam(':vendor_id', $vendor_id);
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
		}
		public function add_store_locations($address, $zipcode, $vendor_id = NULL){
			if($vendor_id == NULL){
				$vendor_id = $this->getVendorid();
				}
				
			$PDODB = Utility::getPDO();
			$query = $PDODB->prepare("INSERT INTO vendor_locations
									  (
										address
										, zipcode
										, vendor_id
									  )
									  VALUES
									  (
										:address
										, :zipcode
										, :vendor_id
									  );");
			$query->bindParam(':address', $address);
			$query->bindParam(':zipcode', $zipcode);
			$query->bindParam(':vendor_id', $vendor_id);
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
		}

		public function get_hours($vendor_id = NULL){
			$DB = Utility::getDB();
			if($vendor_id == NULL){
				$vendor_id = $this->getVendorid();
			}
				
			return $DB->getCurrentVendorHours($vendor_id);
		}
		
		public function get_store_locations($vendor_id = NULL){
			$DB = Utility::getDB();
			if($vendor_id == NULL){
				$vendor_id = $this->getVendorid();
			}
				
			return $DB->getCurrentVendorStoreLocations($vendor_id);
		}

		
	}
	
?>