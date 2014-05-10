<style type="text/css">
	div#productTitle{
		padding-left:10px;
	}
	div#productMoreTitle{
		padding-top:30px;
		float: left;
		font-size:150%;
	}
	div#productImage {
		float: left;
		min-width:170px;
		width: 35%;
		padding-left:10px;
	}
	div#productInfo {
		float:left;
		width: 60%;
	}
	div#productMore {
		float:left;
		padding-left:10px;
		padding-right:10px;
		width: 5%;
		min-width:80px;
	}
	div#clearStop {
		clear:both;
	}
</style>

<div id="productTitle">
	<h1><?php echo $ProductController->getName(); ?> </h1>
</div>

<div id="productImage">
	<p>
		<img src="class/View/cheese.jpg" alt="Good Image" width="150" height="150">
	</p>
</div>

<div id="productInfo">
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

<div id="clearStop"></div>

<div id="productMoreTitle">
	<b>More From This Vendor</b><br>
</div>

<div id="clearStop"></div>

<div id="productMore">
	<img src="class/View/cheese.jpg" alt="More Food" width="60" height="60">
	<button type="button">Check It Out!</button>
</div>

<div id="productMore">
	<img src="class/View/cheese.jpg" alt="More Food" width="60" height="60">
	<button type="button">Check It Out!</button>
</div>

<div id="productMore">
	<img src="class/View/cheese.jpg" alt="More Food" width="60" height="60">
	<button type="button">Check It Out!</button>
</div>




