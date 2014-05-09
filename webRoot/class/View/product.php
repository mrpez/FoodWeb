<style type="text/css">
	div#menuLeftPane {
		float: left;
		width: 35%;
	}
	div#menuRightPane {
		float:left;
		width: 60%;
	}
	.floatstop {
		clear:both;
	}
</style>

<div>
	<h1><?php echo $ProductController->getName(); ?> </h1>
</div>

<div id="menuLeftPane">
	<p>
		<img src="class/View/cheese.jpg" alt="Good Image" width="150" height="150">
	</p>
</div>

<div id="menuRightPane">
	<p>
		<b>Price: $</b> <?php echo $ProductController->getPrice();?><br><br>
		<b>Description:</b><br>
		<?php echo $ProductController->getDescription();?><br>
		<form name="input" action="add link here" method="get">
			<b>Quantity:</b> <input type="int" name="productQuantity">
			<input type="submit" value="Add To Tray">
		</form>
	</p>
</div>
<div id=".floatstop"></div>