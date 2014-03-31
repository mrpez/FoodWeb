<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	class Category extends Utility {
		
		private $category_name;
		private $category_id;
		private $category_description;
		
		function __construct($category_id) {
			$this->category_name = 'Test Category Name';
			$this->category_id = $category_id;
			$this->category_description = 'Test Category Description';
		}
		
		public function getCategoryName() {
			return $this->category_name;
		}
		
		public function getCategoryId() {
			return $this->category_id;
		}
		
		public function getCategoryDescription() {
			return $this->category_description;
		}
		
		public function setCategoryName($category_name) {
			return $this->category_name = $category_name;
		}
		
		public function setCategoryId($category_id) {
			return $this->category_id = $category_id;
		}
		
		public function setCategoryDescription($category_description) {
			return $this->category_description = $category_description;
		}
		
	}
	
?>