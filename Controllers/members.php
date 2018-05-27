<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/members.php' );

	$id = false;
	if( isset($_GET['id']) && !empty($_GET['id']) ){
		if(checkSeasonByID($_GET['id'])){
			$id = trim($_GET['id']);
		}else{
			header('Location: /?c=members');
			exit();
		}
	}

	$season_name = getSeasonNameByID($id);

	$all_members = getAllMembers($id);


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/members.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'members';
	$cur_menu_season_id = $id;

	$seasons_menu = getSeasonsMenu();

	$page_title = 'Biedri '.$season_name;


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>