<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/main.php' );

	$last_scenes = getLastScenes();

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/main.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'main';
	$seasons_menu = getSeasonsMenu();

	$page_title = 'Galvenā';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>