<?php 
	date_default_timezone_set("Asia/Shanghai");
	include_once('public/global/config/dbconfig.php');
	include_once('public/global/utils/dbutils.php');
	include_once('public/global/utils/HtmlArtWrapper.php');
	include ('public/global/utils/FileUtil.php');

	$res = array();
	

	$pid = $_POST['parent_id'];
	$date = $_POST['t'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$content = $_POST['content'];

	//POST packed Article
	$wrapper = new HtmlArtWrapper();
	$wrapper->wrap($title,$author,$date,$content);
	
	
	//write file
	$domain = "http://localhost/ncg/";
	$preffix = "public/articles";
	$subffix = ".html";

	$fu = new FileUtil();

	$dir = $preffix.'/'.date("Y/m/d/");
	$diff = (mktime() - filemtime($dir));
	if($diff < 10){
		//1分钟之内不可写
		$res['isSuccess'] = false;
		$res['errorMess'] = "Write file to fast, "+$diff;
		exit(json_encode($res));
	}
	$url = $preffix.'/'.date("Y/m/d/").md5(mktime()).$subffix;
	$fu->createFile($url);

	$contents = $wrapper->getPanel();
	iconv('UTF8', 'GB2312', $contents);
	$tag = file_put_contents($url, $contents);
	
	$res['isSuccess'] = $tag>0;
	if($tag){
		$res['directUrl'] = $domain.$url;
	}
	echo json_encode($res);
?>