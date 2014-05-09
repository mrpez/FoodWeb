<?php

	if(!array_key_exists ("productId" , $_GET)){
			header("Location: /404.php");
			die;
		}	
			
		$itemId = intval($_GET["productId"]);
		
		include(dirname(__FILE__) . '/../Controller/ProductController.php');
		$ProductController = new ProductController($itemId);
		
?>