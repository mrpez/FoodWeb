<?php
	
	if( !class_exists('Vendor') ) {
		include(dirname(__FILE__) . '/../Model/Vendor.php');
		$Vendor = new Vendor;
	}
	
	class VendorController extends Vendor {
		
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
		
		public function isVendor() {
			return true;
		}
		
		public function add_hours($day, $opening_time, $closing_time, $vendor_id = $this->getVendorid()){
			$PDODB = Utility::getPDO();
			$query = $PDODB->prepare("INSERT INTO vendors
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
		
	}
	
?>