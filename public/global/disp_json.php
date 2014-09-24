<?php
	$params = array();
	$params['ajaxRouter'] = array(
									'menu',
									'article',
									'user',
								);// for ajax router

	
	$params['callbacks'] = array();

	return json_encode($params);
?>