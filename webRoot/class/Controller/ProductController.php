<?php

if( !class_exists('Product') ) {
	include(dirname(__FILE__) . '/../Model/Product.php');
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
	}
	
	

}

?>