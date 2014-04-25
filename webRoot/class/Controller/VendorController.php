<?php
	
	if( !class_exists('Vendor') ) {
		include(dirname(__FILE__) . '/../Model/Vendor.php');
		$Vendor = new Vendor;
	}
	
	class VendorController extends Vendor {
	
		public function __construct() {
			$DB = Utility::getDB();
			
			if( !class_exists('LoginController') )
				include(dirname(__FILE__) . '/LoginController.php');
			if( !isSet($LoginController) )
				$LoginController = new LoginController;
			
			$user_id = $LoginController->getUserIndex();
			if( $user_id !== false ) {
				$result = $DB->checkIfUserIsVendor($user_id);
				if( $result !== false ) {
					$this->setVendorId($result);
				}
			}
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
				$this->getVendorid();
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
		/*
		public function get_hours($vendor_id = NULL){
			if($vendor_id == NULL){
				$this->getVendorid();
				}
				
			$qryHours = $DB->($vendor_id);
			if( $qryHours !== false ) {
				return $qryHours
			}
		}
		*/
		
		
	}
	
?>