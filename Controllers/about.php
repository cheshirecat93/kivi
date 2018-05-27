<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/about.php' );

	$about_data = getAboutData();

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/about.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'about';
	$seasons_menu = getSeasonsMenu();

	$page_title = 'Par KIVI';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>