<?php

	$article_id = $_POST['article_id'];
	dispatcher($article_id);
	function dispatcher($id){
		include('public/articles/'.$id.'.html');
	}
?>