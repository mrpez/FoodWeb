<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/Utility.php');
		$Utility = new Utility;
	}
	
	class MySQLDAO extends Utility {
		
		private $DBC = null;
		
		public function addUser($name, $email, $password) {
			$PDODB = $this->getPDO();
			
			// Add user to database
			$query = $PDODB->prepare("INSERT INTO users
									  (
										name
										, email
									  )
									  VALUES
									  (
										:name
										, :email
									  )");
			$query->bindParam(':name', $name);
			$query->bindParam(':email', $email);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// Get the last id from the above query
			$user_id = $PDODB->lastInsertId();
			
			// Now store their password
			$query = $PDODB->prepare("INSERT INTO user_passwords
									  (
										user_id
										, password
									  )
									  VALUES
									  (
										:user_id
										, :password
									  )");
			$query->bindParam(':user_id', $user_id);
			$query->bindParam(':password', $password);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
		}
		
		public function addMenu($menuName, $vendorId) {
			$PDODB = $this->getPDO();
			
			// Add Menu
			$query = $PDODB->prepare("INSERT INTO menus
									  (
										vendor_id
										, name
									  )
									  VALUES
									  (
										:vendor_id
										, :name
									  );");
			$query->bindParam(':vendor_id', $vendorId);
			$query->bindParam(':name', $menuName);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			$menu_id = $PDODB->lastInsertId();
			
			// Add Top Level Menu Category
			$query = $PDODB->prepare("INSERT INTO menu_categories
									  (	
										name
									  )
									  VALUES
									  (
										:name
									  );");
			$query->bindParam(':name', $menuName);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			$topLevelCat = $PDODB->lastInsertId();
			
			
			
			// Add Top Level Menu Category to Tree
			$query = $PDODB->prepare("INSERT INTO menu_category_tree
									  (	
										menu_id
										, category_id
										, left_pointer
										, right_pointer
									  )
									  VALUES
									  (
										:menu_id
										, :cat_id
										, 0
										, 1
									  );");
			$query->bindParam(':menu_id', $menu_id);
			$query->bindParam(':cat_id', $topLevelCat);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
			
		}
		
		public function addMenuCategory($menu_id, $parent_left_pointer, $category_name) {
			$PDODB = Utility::getPDO();
			
			$new_left_pointer = $parent_left_pointer + 1;
			$new_right_pointer = $parent_left_pointer + 2;
			
			// Add Top Level Menu Category
			$query = $PDODB->prepare("INSERT INTO menu_categories
									  (	
										name
									  )
									  VALUES
									  (
										:name
									  );");
			$query->bindParam(':name', $category_name);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			$cat_id = $PDODB->lastInsertId();
						
			// Make room for the new category
			$query = $PDODB->prepare("UPDATE menu_category_tree
									  SET left_pointer = left_pointer + 2
									  WHERE left_pointer > :left_pointer
									    AND menu_id = :menu_id;");
			$query->bindParam(':left_pointer', $parent_left_pointer);
			$query->bindParam(':menu_id', $menu_id);
			
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$query = $PDODB->prepare("UPDATE menu_category_tree
									  SET right_pointer = right_pointer + 2
									  WHERE right_pointer > :left_pointer
									    AND menu_id = :menu_id;");
			$query->bindParam(':left_pointer', $parent_left_pointer);
			$query->bindParam(':menu_id', $menu_id);
			
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// Add Top Level Menu Category to Tree
			$query = $PDODB->prepare("INSERT INTO menu_category_tree
									  (	
										menu_id
										, category_id
										, left_pointer
										, right_pointer
									  )
									  VALUES
									  (
										:menu_id
										, :cat_id
										, :left_pointer
										, :right_pointer
									  );");
			$query->bindParam(':menu_id', $menu_id);
			$query->bindParam(':cat_id', $cat_id);
			$query->bindParam(':left_pointer', $new_left_pointer);
			$query->bindParam(':right_pointer', $new_right_pointer);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return true;
		}
		
		public function addProduct($menu_id, $parentLeftPointer) {			
			$PDODB = Utility::getPDO();
			
			$new_left_pointer = $parentLeftPointer + 1;
			$new_right_pointer = $parentLeftPointer + 2;
			
			// Add Product
			$query = $PDODB->prepare("INSERT INTO menu_items
									  (	
										name
									  )
									  VALUES
									  (
										'New Product'
									  );");
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			$cat_id = $PDODB->lastInsertId();
						
			// Make room for the new category
			$query = $PDODB->prepare("UPDATE menu_category_tree
									  SET left_pointer = left_pointer + 2
									  WHERE left_pointer > :left_pointer
									    AND menu_id = :menu_id;");
			$query->bindParam(':left_pointer', $parentLeftPointer);
			$query->bindParam(':menu_id', $menu_id);
			
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$query = $PDODB->prepare("UPDATE menu_category_tree
									  SET right_pointer = right_pointer + 2
									  WHERE right_pointer > :left_pointer
									    AND menu_id = :menu_id;");
			$query->bindParam(':left_pointer', $parentLeftPointer);
			$query->bindParam(':menu_id', $menu_id);
			
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// Add Top Level Menu Category to Tree
			$query = $PDODB->prepare("INSERT INTO menu_category_tree
									  (	
										menu_id
										, item_id
										, left_pointer
										, right_pointer
									  )
									  VALUES
									  (
										:menu_id
										, :cat_id
										, :left_pointer
										, :right_pointer
									  );");
			$query->bindParam(':menu_id', $menu_id);
			$query->bindParam(':cat_id', $cat_id);
			$query->bindParam(':left_pointer', $new_left_pointer);
			$query->bindParam(':right_pointer', $new_right_pointer);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return $cat_id;
		}
		
		public function checkEmail($email) {
			$PDODB = $this->getPDO();
			
			// Check if email already exists in DB
			$query = $PDODB->prepare("SELECT id
									  FROM users 
									  WHERE email = :email;");
			$query->bindParam(':email', $email);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// If it exists, fail
			$qryResults = $query->fetchAll();
			if( count($qryResults) )
				return $qryResults[0]['id'];
				
			return false;
		}
		
		public function checkIfUserIsVendor($user_id) {
			$PDODB = $this->getPDO();
			
			// Check if email already exists in DB
			$query = $PDODB->prepare("SELECT id
									  FROM vendors 
									  WHERE owner_id = :user_id;");
			$query->bindParam(':user_id', $user_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// If it exists, fail
			$qryResults = $query->fetchAll();
			if( count($qryResults) )
				return $qryResults[0]['id'];
				
			return false;
		}
		
		public function getMenuChildren($menu_id, $element_id) {
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("	SELECT *
										FROM
										(
											SELECT MCT.id AS category_item_id
															, MCT.left_pointer
															, MCT.right_pointer
															, MC.id AS item_id
															, 0 AS item_type
															, MC.name
											FROM menu_category_tree MCT
											INNER JOIN menu_categories MC
												ON MCT.category_id = MC.id
											INNER JOIN menu_category_tree SEL
												ON SEL.left_pointer = :element_id
												AND SEL.menu_id = :menu_id
												AND MCT.menu_id = :menu_id
												AND MCT.left_pointer > SEL.left_pointer
												AND MCT.right_pointer < SEL.right_pointer

											UNION

											SELECT MCT.id AS category_item_id
															, MCT.left_pointer
															, MCT.right_pointer
															, MI.id AS item_id
															, 1 AS item_type
															, MI.name
											FROM menu_category_tree MCT
											INNER JOIN menu_items MI
												ON MCT.item_id = MI.id
											INNER JOIN menu_category_tree SEL
												ON SEL.left_pointer = :element_id
												AND SEL.menu_id = :menu_id
												AND MCT.menu_id = :menu_id
												AND MCT.left_pointer > SEL.left_pointer
												AND MCT.right_pointer < SEL.right_pointer
										) Q
										ORDER BY Q.left_pointer;");
			$query->bindParam(':menu_id', $menu_id);
			$query->bindParam(':element_id', $element_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$query = $query->fetchAll();
			
			if( count($query) == 0 )
				return $query;
			
			$finalResults = array();
			$finalResults[] = $query[0];
			for($i = 1; $i < count($query); $i++) {
				if( $query[$i]['left_pointer'] > $finalResults[count($finalResults)-1]['right_pointer'] )
					$finalResults[] = $query[$i];
			}
			
			return $finalResults;
		}
		
		public function getVendorMenus($vendor_id) {
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("SELECT id
											  , name
									  FROM menus 
									  WHERE vendor_id = :vendor_id;");
			$query->bindParam(':vendor_id', $vendor_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return $query->fetchAll();
		}
		
		public function getMenuName($menuId) {
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("SELECT name
									  FROM menus 
									  WHERE id = :menuId;");
			$query->bindParam(':menuId', $menuId);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$q = $query->fetchAll();
			
			if( count($q) )
				return $q[0]['name'];
				
			return '';
		}
		
		public function getVendorName($vendor_id) {
			$PDODB = $this->getPDO();
			
			// Check if email already exists in DB
			$query = $PDODB->prepare("SELECT name
									  FROM vendors 
									  WHERE id = :vendor_id;");
			$query->bindParam(':vendor_id', $vendor_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			// If it exists, fail
			$qryResults = $query->fetchAll();
			if( count($qryResults) )
				return $qryResults[0]['name'];
				
			return false;
		}
		
		public function getVendorInfo($vendorId) {
			$PDODB = $this->getPDO();
			
			$q = $PDODB->prepare("SELECT V.name
								  FROM vendors V
								  WHERE V.id = :id;");
			$q->bindParam(':id', $vendorId);
			if(!$q->execute()) {
				Utility::throwError($q->errorInfo());
				return false;
			}
			
			// If it exists, fail
			$qryResults = $q->fetchAll();
			if( count($qryResults) )
				return $qryResults[0];
				
			return false;		
		}
		
		public function getVendorLocationInfo($vendorId, $locationId) {
			$PDODB = $this->getPDO();
			
			$q = $PDODB->prepare("SELECT V.name
										 , VL.address
										 , VL.zipcode
								  FROM vendors V
								  INNER JOIN vendor_locations VL
									ON V.id = VL.vendor_id
									AND VL.id = :locationId
								  WHERE V.id = :id;");
			$q->bindParam(':id', $vendorId);
			$q->bindParam(':locationId', $locationId);
			if(!$q->execute()) {
				Utility::throwError($q->errorInfo());
				return false;
			}
			
			// If it exists, fail
			$qryResults = $q->fetchAll();
			if( count($qryResults) )
				return $qryResults[0];
				
			return false;		
		}
		
		public function updateProduct($item_id, $name, $price, $description) {
			$PDODB = $this->getPDO();
			
			$q = $PDODB->prepare("UPDATE menu_items
								  SET name = :name
									  , price = :price
									  , description = :description
								  WHERE id = :item_id;");
			$q->bindParam(':name', $name);
			$q->bindParam(':price', $price);
			$q->bindParam(':description', $description);
			$q->bindParam(':item_id', $item_id);			
			if( !$q->execute() ) {
				Utility::throwError($q->errorInfo());
				return false;
			}
			
			return true;
		}
		
		public function verifyLogin($password, $email) {
			$PDODB = $this->getPDO();
		
			$query = $PDODB->prepare("SELECT U.id
									  FROM users U
									  INNER JOIN user_passwords UP
										ON U.id = UP.user_id
										AND UP.password = :password
									  WHERE email = :email;");
			$query->bindParam(':password', $password);
			$query->bindParam(':email', $email);
			
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			$qryResults = $query->fetchAll();
			
			if( count($qryResults) ) {
				return $qryResults[0]['id'];
			}
			
			return false;
		}
		
		public function addTrayItem($user_id,$item_id, $tray_id, $quantity){
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("INSERT INTO tray_items
									  (
										id,
										item_id,
										tray_id,
										quantity
									  )
									  VALUES
									  (
										:user_id
										, :tray_id
										, :tray_id
										, :quantity
									  )");
			$query->bindParam(':user_id', $user_id);
			$query->bindParam(':item_id', $item_id);
			$query->bindParam(':tray_id', $tray_id);
			$query->bindParam(':quantity', $quantity);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
		}
		
		public function getTrayItem($tray_id){
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("SELET id
											 , name
									  FROM tray_items TI
									  INNER JOIN trays TRA
										ON TI.tray_id = TRA.id
										AND TRA.user_id = :user_id;");
			$query->bindParam(':user_id', $vendor_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return $query->fetchAll();
		}
		public function removeTrayItem($tray_item_id){
			$PDODB = $this->getPDO();
		
			$query = $PDODB->prepare("DELETE FROM tray_items
										WHERE item_id  = :item;");
			$query->bindParam(':item', $tray_item_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
		}

		public function emptyTray($tray_id){
			$PDODB = $this->getPDO();
			
			$query = $PDODB->prepare("DELETE FROM trays_items
										WHERE tray_id = :tray_id;");
			$query->bindParam(':tray_id', $tray_id);
			if(!$query->execute()) {
				Utility::throwError($query->errorInfo());
				return false;
			}
		}
		
		public function updateTray($tray_id){
		
		}
				
		public function getCurrentVendorHours($vendorid) {
			$PDODB = $this->getPDO();
			$query = $PDODB->prepare("SELECT day_of_week
											, opening_time
											, closing_time
									  FROM vendor_hours
									  WHERE vendor_id = :vendorid;");
			$query->bindParam(':vendorid', $vendorid);
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return $query->fetchAll();
		}
		public function getCurrentVendorStoreLocations($vendorid) {
			$PDODB = $this->getPDO();
			$query = $PDODB->prepare("SELECT address
											, zipcode
									  FROM vendor_locations
									  WHERE vendor_id = :vendorid;");
			$query->bindParam(':vendorid', $vendorid);
			if( !$query->execute() ) {
				Utility::throwError($query->errorInfo());
				return false;
			}
			
			return $query->fetchAll();
		}
		
		public function getProductInfo($productId) {
			$PDODB = Utility::getPDO();
			
			$q = $PDODB->prepare("SELECT id
										 , price
										 , name
										 , description
								  FROM menu_items
								  WHERE id = :id;");
			$q->bindParam(':id', $productId);
			
			if( !$q->execute() ) {
				Utility::throwError($q->errorInfo());
				return false;
			}
			
			$q = $q->fetchAll();
			
			if( count($q) == 0 ) {
				return false;
			}
			
			return $q[0];
		}
		
	}

?>