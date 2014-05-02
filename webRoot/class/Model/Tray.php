<?php
	// This is really just a fancy name for Cart
	
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	
	class Tray extends Utility {
		private $orderSubTotal;
		private $taxRate;
		private $orderTotal;
		private $Orders = array(1);
		
		function __construct() {
			$orderSubtotal = 0.00;
			$taxRate = 0.00;
			$netTotal = 0.00;
		}
		public function getTrayId(){
		
		return $this->tray_id;
		}
		
		public function addOrder($x) {
			$this->Orders[] = $x;
		}
		
		public function getOrders() {
			return $this->Orders;
		}
		
		public function getNumOrders() {
			return count($this->Orders);
		}
		
		public function setTaxRate($x) {
			$this->taxRate = $x;
		}
		
		public function getTaxRate() {
			return $this->taxRate;
		}
		
		public functionGetOrderTotal() {
			return (($this->orderTotal)*(1 + $this->taxRate));
		}
	}
	
?>