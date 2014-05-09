<?php
	if( !array_key_exists('productId', $_GET) ) {
		$_GET['productId'] = 0;
	}
	
	if( !class_exists('ProductController') ) {
		include(dirname(__FILE__) . '/../class/Controller/ProductController.php');
	}
	
	$thisProduct = new ProductController($_GET['productId']);
?>
<input type="hidden" id="editProductId" value="<?php echo $thisProduct->getProductId(); ?>"/>
<h2>Edit Product</h2>
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" id="editProductName" style="width: 100%;" value="<?php echo $thisProduct->getName(); ?>"/></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input type="text" id="editProductPrice" style="width: 100%;" value="<?php echo $thisProduct->getPrice(); ?>"/></td>
	</tr>
	<tr>
		<td>Description</td>
		<td style="width: 100%;"><textarea id="editProductDescription" style="width: 100%; height: 50%;"><?php echo $thisProduct->getDescription(); ?></textarea></td>
	<tr>
		<td colspan="2">
			<button onclick="menu.saveProduct();" id="editProductSaveButton">Save Changes to Product</button>
			<span id="editProductSavedIndicator" style="display:none; color: green; font-weight:bold;">Saved!</span>
		</td>
	</tr>
</table>