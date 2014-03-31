<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	
	public class Order {
		private $orderName;
		private $items = array(1);
		private $sides = array(1);
		
		public function setOrderName($x){
			$this->orderName =$x;
		}
		
		public function addMenuItem($x){
			$this->items[] = $x;
		}
		
		public funtion addSideItem($x){
			$this->sides[] = $x;
		}		
		
		public function getOrderName() {
			return $this->orderName;
		}
		public function getItems(){
			return $this->items;
		}
		
		public function getSides(){
			return $this->sides;
		}
		
	}
	
?>