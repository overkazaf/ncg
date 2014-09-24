<?php

	$filename = 'public/articles/0.html';
	$contents = 'Testing contents';
	echo file_put_contents($filename,$contents);
?>