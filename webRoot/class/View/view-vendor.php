<?php
	
	echo '<h1>' . $locationInfo['name'] . '</h1>
		  <p>
			' . $locationInfo['address'] . '<br />
			' . $cityInfo['city'] . ', ' . $cityInfo['state'] . ' ' . $locationInfo['zipcode'] . '
		  </p>
		  <br />
		  <h3>Available Menus</h3>
			<ul>';
			for($i = 0; $i < count($menus); $i++) {
				echo '<li><a href="/view-menu.fw?menuId=' . $menus[$i]['id'] . '">' . $menus[$i]['name'] . '</a></li>';
			}
			echo '</ul>';
			if( count($menus) == 0 ) {
				echo '<p>This vendor has no menus available at this time. Check back later!</p>';
			}
?>