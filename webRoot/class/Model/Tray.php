<?php
	// This is really just a fancy name for Cart
	
	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}	
	
	class Tray extends Utility {
		private $numOrders;
		private $orderSubTotal;
		private $taxRate;
		private $OrderTotal;
		private $Orders = array(1);
		
		function __construct() {
			$numOrders = 0;
			$orderSubtotal = 0.00;
			$taxRate = 0.00;
			$netTotal = 0.00;
		}
		
		public function addOrder($x) {
			$this->Orders[] = $x;
		}
		
		public function getOrders() {
			return $this->Orders;
		}
	}
	
?>