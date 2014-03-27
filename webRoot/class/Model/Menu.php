<?php

	if( !class_exists('Utility') ) {
		include(dirname(__FILE__) . '/../Utility.php');
		$Utility = new Utility;
	}
	$maxItems = 5;
	$maxSide = 10;  //2 sides per food item
	
	public class order{
		public $orderName;
		public $items[$maxItems];
		public $sides[$maxSides];
		
		public function setOrderName($x){
		$this->name =$x;
		}
		
		public function saveMenuItem($x){
			$i=count($items);
			$this->$items[$i] = $x;
		}
		
		public funtion saveSideItem($x){
			$i=count($sides);
			$this->$sides[$i] = $x;
		}
		
		
		
		
	}
	
	
	class Menu extends Utility {
		

		
		
		
	}

?>