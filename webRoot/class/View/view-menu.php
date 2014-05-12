<?php

	echo '<h1>Browse ' . $thisMenu->getName() . ' Menu</h1>
		  <ul>';
	for($i = 0; $i < count($menuItems); $i++) {
		if( $menuItems[$i]['item_type'] ) {
			echo '<li><a href="/product.fw?productId=' . $menuItems[$i]['item_id'] . '">' . $menuItems[$i]['name'] . '</a></li>';
		} else {
			echo '<li><a href="/view-menu.fw?menuId=' . $_GET['menuId'] . '&elementId=' . $menuItems[$i]['left_pointer'] . '">' . $menuItems[$i]['name'] . '</a></li>';
		}
	}
	echo '</ul>';
	
	if( !count($menuItems) ) {
		echo 'Nothing exists in this category. Try another menu or category.';
	}

?>