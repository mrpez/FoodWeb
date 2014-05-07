<?php
	if( !array_key_exists('productId', $_GET) ) {
		$_GET['productId'] = 0;
	}
	
	if( !class_exists('ProductController') ) {
		include(dirname(__FILE__) . '/../class/Controller/ProductController.php');
	}
	
	$thisProduct = new ProductController($_GET['productId']);
?>
<table>
	<tr>
		<td>Product Name</td>
		<td><input type="text" id="editProductName" value="<?php echo $thisProduct->getName(); ?>"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<button onclick="menu.saveProduct();">Save Changes to Product</button>
		</td>
	</tr>
</table>