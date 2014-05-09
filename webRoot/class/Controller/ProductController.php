<?php

if( !class_exists('Product') ) {
	include(dirname(__FILE__) . '/../Model/Product.php');
	$Product = new Product;
}

if( !class_exists('Utility') ) {
	include(dirname(__FILE__) . '/../Model/Utility.php');
}

class ProductController extends Product {

	function __construct($productId = null) {
		if( intval($productId) < 1 ) {
			Utility::throwError('No product id supplied to initialize product controller.');
		}
		
		$DB = Utility::getDB();
		
		$productInfo = $DB->getProductInfo($productId);
		
		$this->setProductId($productInfo['id']);
		$this->setPrice($productInfo['price']);
		$this->setName($productInfo['name']);
		$this->setDescription($productInfo['description']);
	}
	
	public function updateProduct($item_id, $name, $price, $description) {
		$DB = $this->getDB();
		
		// Update database
		$DB->updateProduct($item_id, $name, $price, $description);
		
		// Rebuild the object with new values
		$this->__construct($item_id);
		
		return true;
	}
	

}

?>