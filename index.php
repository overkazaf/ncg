<!doctype html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
<title>南通滨海园区科教城官方网站</title>
<?php include('./css_import.php'); ?>
<?php include('./js_import.php'); ?>

<script type="text/javascript">
	$(document).on('click', 'a[href="#fakelink"]', function (e) {
      e.preventDefault();
    });
	$(document).ready(function(){
		$('.input-group').on('focus', '.form-control', function () {
	      $(this).closest('.input-group, .form-group').addClass('focus');
	    }).on('blur', '.form-control', function () {
	      $(this).closest('.input-group, .form-group').removeClass('focus');
	    });
	});	
</script>
</head>
<body>
<?php
	include('./header.php');
?>

<div id="ajaxContainer">
	<?php include('./body.php'); ?>
</div>

<?php
	include('./footer.php');
?>
</body>
</html>