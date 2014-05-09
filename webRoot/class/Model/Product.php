<?php

if( !class_exists('Utility') ) {
	include(dirname(__FILE__) . '/../Utility.php');
}

class Product extends Utility {
	
	private $productId;
	private $price;
	private $name;
	private $description;
	private $images = array();
	
	// Setters
	public function setProductId($productId) {
		$this->productId = $productId;
	}
	public function setPrice($price) {
		$this->price = $price;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function setDescription($description) {
		$this->description = $description;
	}
	
	// Getters	
	public function getProductId() {
		return $this->productId;
	}
	public function getPrice() {
		return $this->price;
	}
	public function getName() {
		return $this->name;
	}
	public function getDescription() {
		return $this->description;
	}
	
}

?>