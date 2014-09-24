<?php
	header("Content-type:text/html;charset=utf-8");
	include('./config/dbconfig.php');
	include('./utils/dbutils.php');
	include('./utils/menutools.php');
	$menu = new Menu();
?>

<!doctype html>
<html>
<head>
<title>Testing</title>

<script type="text/javascript">
	$(document).ready(function(){
		$('#ajaxBtn').on('click',function(){
			console.log('132');
		});
	});
</script>
</head>	
<body>
	<button class="btn btn-primary" id="ajaxBtn">Ajax</button>
</body>
</html>