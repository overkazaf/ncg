<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("config/dbconfig.php");
	include_once("utils/dbutils.php");
	$mysql = new DBUtils();
	$sql = "SELECT * from articles";
	$mysql->query($sql);

	$qInfo = array();
	if($mysql->getResultSize() == 0){
		$qInfo['isSuccess'] = false;
	}else{
		$qInfo['isSuccess'] = true;
		$qInfo['responseText'] = $mysql->getResultSet();
	}

	echo json_encode($qInfo);
?>