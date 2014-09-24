<?php
	header("Content-type:text/html;charset=utf-8");
	include('public/global/config/dbconfig.php');
	include('public/global/utils/dbutils.php');
	include('public/global/utils/menutools.php');
	$pid = $_POST['pid'];
	$menu = new Menu();
	echo $menu->displayRootMenu($pid);
?>