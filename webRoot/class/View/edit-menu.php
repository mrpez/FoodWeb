<script type="text/javascript">
	window.onload = function() {
		$.ajax({
			url:'/ajax.php'
			, type:'post'
			, data: {
				'method':'getMenu'
			}
			, dataType:'json'
			, success:function(data) {
				alert('Test');
			}
			, error:function() {
				alert('Error loading data.');
			}
		});
	};
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
</style>
<h1>Edit Menu</h1>
<div id="menuLeftPane">
</div>
<div id="menuRightPane">
</div>
<div style="clear:both;"></div>