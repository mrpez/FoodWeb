<?php
	if( !array_key_exists('productId', $_GET) ) {
		$_GET['productId'] = 0;
	}
	
	if( !class_exists('ProductController') ) {
		include(dirname(__FILE__) . '/../class/Controller/ProductController.php');
	}
	
	$thisProduct = new ProductController($_GET['productId']);
?>
<h2>Edit Product</h2>
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" id="editProductName" value="<?php echo $thisProduct->getName(); ?>"/></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input type="text" id="editProductPrice" value="<?php echo $thisProduct->getPrice(); ?>"/></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><textarea id="editProductDescription"><?php echo $thisProduct->getDescription(); ?></textarea></td>
	<tr>
		<td colspan="2">
			<button onclick="menu.saveProduct();">Save Changes to Product</button>
		</td>
	</tr>
</table>