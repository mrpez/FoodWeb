<input type="hidden" id="selectedMenuId" value="<?php echo $_GET['menuId'];?>"/>
<input type="hidden" id="selectedLastLeftPointer" value="<?php echo $_GET['lastElementLeftPointer'];?>"/>
<table>
	<tr>
		<td>Category Name</td>
		<td><input type="text" id="newCategoryName" maxlength="100"></td>
	</tr>
	<tr>
		<td colspan="2">
			<button onclick="menu.addCategory1()">Add Category</button>
		</td>
	</tr>
</table>