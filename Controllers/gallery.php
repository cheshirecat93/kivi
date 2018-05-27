<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/gallery.php' );


	$all_images = getAllImages();


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/gallery.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'gallery';

	$seasons_menu = getSeasonsMenu();

	$page_title = 'Foto';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>