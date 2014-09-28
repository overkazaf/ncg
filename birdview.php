<?php
	header("Content-type:text/html;charset=utf-8");
	include('public/global/config/dbconfig.php');
	include('public/global/utils/dbutils.php');
	include('public/global/utils/menutools.php');
	$menu = new Menu();
	
?>

<!doctype html>
<html>
<head>
	<title>南通滨海园区科教城官方网站</title>
	<?php include('./css_import.php');?>
	<style type="text/css">
    /* Custom Styles */
    ul.nav-tabs{
    	position: absolute;
        width: 200px;
        top: 0;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    ul.nav-tabs li:first-child{
        border-top: none;
    }
    ul.nav-tabs li a{
        margin: 0;
        padding: 8px 16px;
        border-radius: 0;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    ul.nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    ul.nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    ul.nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
    i.fui-arrow-right, i.fui-arrow-left{
    	position: absolute;
    	right:10px;
    }
    .headimg img{
    	width:90%;
    }
</style>
	<?php include('./js_import.php');?>
	<script type="text/javascript">
	$(document).ready(function(){
		getArticle(0);
	});

	function getSubMenu(pid){
		var params = {};
			params.pid = pid;
			var json  = null;
			ajaxJSON(
				'getSubMenu.php',
				'post',
				params,
				function(e,status){
					$("#ajaxContainer").empty().html(e.responseText);
				},
				function(e,status){
					$("#myScrollspy").empty().html(e.responseText);
					
				}
			);
			getArticle(pid);
	}
	function getArticle(pid){
		var art = {};
			art.article_id = pid;
		ajaxJSON(
				'article_dispatcher.php',
				'post',
				art,
				function(e,status){
					$("#ajaxContainer").html("").html(e.responseText);
				},
				function(e,status){
					$("#ajaxContainer").html("").html(e.responseText);
				}
			);
	}
</script>
</head>
<body data-spy="scroll" data-target="#myScrollspy">
	<?php include("./header.php");?>
	<div class="jumbotron text-center">
		<div class="row">
			<div class="headimg col-xs-12">
				<img src="images/samples/intro/head.png" />
			</div>
		</div>
	</div>
	<hr>
	
		<div class="row"><div class="container">
			<div class="col-xs-3" id="myScrollspy">
				<?php echo $menu->displayRootMenu(0);?></div>
			<div class="col-xs-9">
				<div id="ajaxContainer"></div>
			</div>
		</div>
	</div>
	<?php 
		include("./footer.php");?>
	</body>
</html>