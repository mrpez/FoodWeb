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
		
	}
	
?>