<script type="text/javascript">
	window.onload = function() {
		menu.getMenuList();
	};
	
	var menu = {};
	menu.back = ['menu.getMenuList();'];
	
	menu.createMenu0 = function() {
		$.ajax({
			url:'/template/addMenu.php'
			, type:'get'
			, dataType:'html'
			, success:function(data) {
				menu.createPopup('Add Menu', data);
			}
			, error:function() {
				alert('Error loading data.');
			}
		});
		
		return false;
	}
	
	menu.createMenu1 = function() {
		if( menuName = document.getElementById('menuName') ) {
			document.getElementById('menuAddSubmit').disabled = true;
			menuName = menuName.value;
			$.ajax({
				url:'/ajax.php'
				, type:'post'
				, data:{
					method:'newMenu'
					, menuName:menuName
				}
				, dataType:'json'
				, success:function(data) {
					if( !data['returnStatus'] ) {
						menu.getMenuList();
						menu.closePopup();
					}
				}
				, error:function() {
					document.getElementById('menuAddSubmit').disabled = false;
					alert('A connection error has occured. Please check your connection and try again!');
				}
			});
		} else {
			alert('Unknown error occured. Please refresh the page and try again.');
		}
		
		return false;
	}
	
	menu.createPopup = function(title, content) {
		var popup = document.getElementById('hiddenPopup');
		var popupContent = document.getElementById('popupContent');
		var popupTitle = document.getElementById('popupTitle');
		popupContent.innerHTML = content;
		popupTitle.innerHTML = title;
		popup.style.top = '100px';
		popup.style.left = '100px';
		popup.style.display = '';
	}
	
	menu.closePopup = function() {
		var popup = document.getElementById('hiddenPopup');
		popup.style.display = 'none';
	}

	menu.getMenuList = function() {
		$.ajax({
			url:'/ajax.php'
			, type:'post'
			, data:{
				'method':'getMenu'
			}
			, dataType:'json'
			, success:function(data) {
				var arrLines = [];
				arrLines.push('<ul id="menuItems">');
				for(var i = 0; i < data.menus.length; i++) {
					arrLines.push('<li onclick="menu.openMenu(');
					arrLines.push(data.menus[i].id);
					arrLines.push(');">');
					arrLines.push(data.menus[i].name);
					arrLines.push('</li>');
				}
				arrLines.push('</ul>');
				document.getElementById('menuLeftPane').innerHTML = arrLines.join('');
			}
			, error:function() {
				alert('Error occured while retrieving list of menus.');
			}
		});
	}
	
	menu.openMenu = function(menuId) {
		menu.expandCategory(menuId, 0);
	}
	
	menu.nextBack = function(thisTask) {
		menu.back.push(thisTask);
		return 'menu.goBack();';
	}
	
	menu.goBack = function() {
		var oldBack = ['menu.getMenuList();'];
		var lastEle = '';
		for(var i = 1; i < (menu.back.length-1); i++) {
			oldBack.push(menu.back[i]);
		}
		menu.back = null;
		menu.back = oldBack;
		
		eval(menu.back[menu.back.length-1]);
		
		var oldBack = ['menu.getMenuList();'];
		var lastEle = '';
		for(var i = 1; i < (menu.back.length-1); i++) {
			oldBack.push(menu.back[i]);
		}
		menu.back = null;
		menu.back = oldBack;
	}
	
	menu.refreshTree = function() {		
		eval(menu.back[menu.back.length-1]);
		
		var oldBack = ['menu.getMenuList();'];
		var lastEle = '';
		for(var i = 1; i < (menu.back.length-1); i++) {
			oldBack.push(menu.back[i]);
		}
		menu.back = null;
		menu.back = oldBack;
	}
	
	menu.expandCategory = function(menuId, lastElementLeftPointer) {
		$.ajax({
			url:'ajax.php'
			, type:'post'
			, data:{
				'method':'getMenuItems'
				, 'element':lastElementLeftPointer
				, 'menu':menuId
			}
			, dataType:'json'
			, success:function(data) {
				var menuList = [];
				menuList.push('<a href="javascript:void(0);" onclick="');
				menuList.push(menu.nextBack('menu.expandCategory(' + menuId + ', ' + lastElementLeftPointer + ');'));
				menuList.push('">< Back</a> | ');
				menuList.push('<a href="javascript:void(0);" onclick="menu.addCategory0(');
				menuList.push(menuId);
				menuList.push(',');
				menuList.push(lastElementLeftPointer);
				menuList.push(');">Add Category</a> | ');
				menuList.push('<a href="javascript:void(0);" onclick="menu.addProduct0(');
				menuList.push(menuId);
				menuList.push(',');
				menuList.push(lastElementLeftPointer);
				menuList.push(');">Add Product</a>');
				menuList.push('<ul id="menuListing">');
				for(var i = 0; i < data.menuElements.length; i++) {
					if( data.menuElements[i].item_type == 0 ) {
						menuList.push('<li onclick="menu.expandCategory(');
						menuList.push(menuId);
						menuList.push(', ');
						menuList.push(data.menuElements[i].left_pointer);
						menuList.push(');">');
					} else {
						menuList.push('<li onclick="menu.openProduct(');
						menuList.push(data.menuElements[i].item_id);
						menuList.push(');">');					
					}
					menuList.push(data.menuElements[i].name);
					menuList.push('</li>');
				}
				menuList.push('</ul>');
				document.getElementById('menuLeftPane').innerHTML = menuList.join('');
			}
			, error:function() {
				alert('An error occured loading menu items.');
			}
		});
	}
	
	menu.addCategory0 = function(menuId, lastElementLeftPointer) {
		$.ajax({
			url:'/template/addMenuCategory.php'
			, type:'get'
			, data:{
				menuId:menuId
				, lastElementLeftPointer:lastElementLeftPointer
			}
			, dataType:'html'
			, success:function(data) {
				menu.createPopup('Add Category', data);
			}
			, error:function() {
				alert('Error retreiving data. Please try again.');
			}
		});
	}
	
	menu.addCategory1 = function() {
		$.ajax({
			url:'/ajax.php'
			, type:'post'
			, data:{
				method:'addMenuCategory'
				, menuId: document.getElementById('selectedMenuId').value
				, parentLeftPointer: document.getElementById('selectedLastLeftPointer').value
				, categoryName:document.getElementById('newCategoryName').value
			}
			, dataType:'json'
			, success:function(data) {
				eval(menu.back[menu.back.length-1]);
				menu.back.length--;
			}
			, error:function() {
				alert('A connection error has occured. Please check your connection and try again.');
			}
		});
		//menu.openPopup('Add Category', );
	}
	
	menu.addProduct0 = function(menuId, lastElementLeftPointer) {
		$.ajax({
			url:'/ajax.php'
			, type:'post'
			, data:{
				method:'addProduct'
				, menuId:menuId
				, lastElementLeftPointer:lastElementLeftPointer
			}
			, dataType:'json'
			, success:function(data) {
				if(data.returnStatus) {
					alert(data.returnString);
				} else {
					menu.openProduct(data.product_id);
					menu.refreshTree();
				}
			}
			, error:function() {
				alert('Error occured while adding product.');
			}
		});
	}
	
	menu.openProduct = function(product_id) {
		$.ajax({
			url:'/template/editProduct.php'
			, type:'get'
			, data:{
				productId:product_id
			}
			, dataType:'html'
			, success:function(data) {
				document.getElementById('menuRightPane').innerHTML = data;
			}
			, error:function() {
				alert('An unexpected error has occured. Please try opening the product again.');
			}
		});
	}
	
	menu.saveProduct = function() {
		var button = [];
		if( button = document.getElementById('editProductSaveButton') ) {
			button.disabled = true;
		}
		$.ajax({
			url:'/ajax.php'
			, type:'post'
			, data:{
				method:'updateProduct'
				, item_id:document.getElementById('editProductId').value
				, name:document.getElementById('editProductName').value
				, price:document.getElementById('editProductPrice').value
				, description:document.getElementById('editProductDescription').value
			}
			, dataType:'json'
			, success:function(data) {
				button.disabled = false;
				menu.toggleSaved();
				menu.refreshTree();
			}
			, error:function() {
				button.disabled = false;
				alert('A error occured while saving product info.');
			}
		});
	}
	
	menu.toggleSaved = function() {
		if( saved = document.getElementById('editProductSavedIndicator') ) {
			saved.style.display = '';
			setTimeout(function() {
				if( saved = document.getElementById('editProductSavedIndicator') ) {
					saved.style.display = 'none';
				}
			}, 5000);
		}
	}
	
</script>
<style type="text/css">
	div#menuLeftPane {
		float: left;
		width: 35%;
	}
	div#menuRightPane {
		float:left;
		width: 60%;
		border-left: 1px solid #999999;
	}
	div#hiddenPopup {
		position:absolute;
		background-color: white;
		border:1px solid #DDD;
		border-radius: 2px;
	}
	div#popupTitleContainer {
		background-color: black;
		color: white;
		width: 100%;
		min-height: 20px;
		min-width: 400px;
	}
	span#popupClose {
		float:right;
		cursor: pointer;
	}
</style>
<h1>Edit Menus</h1>
<a href="javascript:void(0);" onclick="menu.createMenu0();">Add Menu</a><br />
<div id="menuLeftPane"></div>
<div id="menuRightPane"></div>
<div style="clear:both;"></div>
<div id="hiddenPopup" style="display:none;"><div id="popupTitleContainer"><span id="popupTitle"></span><span id="popupClose" onclick="menu.closePopup();">X</span><div class="clearFix"></div></div><div id="popupContent"></div></div>
