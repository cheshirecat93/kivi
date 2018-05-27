<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/scenes.php' );

	$id = false;
	if( isset($_GET['id']) && !empty($_GET['id']) ){
		if(checkSeasonByID($_GET['id'])){
			$id = trim($_GET['id']);
		}else{
			header('Location: /?c=scenes');
			exit();
		}
	}

	$season_name = getSeasonNameByID($id);

	$all_scenes = getAllScenes($id);


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/scenes.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'scenes';
	$cur_menu_season_id = $id;

	$seasons_menu = getSeasonsMenu();

	$page_title = 'Radījuma sižeti '.$season_name;


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>