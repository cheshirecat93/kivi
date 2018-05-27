<?php

	/*require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/main.php' );

	$last_scenes = getLastScenes();*/

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/main.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'main';

	$page_title = 'Galvenā';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );

?>
