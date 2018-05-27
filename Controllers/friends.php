<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/friends.php' );


	$all_friends = getAllFriends();


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/friends.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'friends';

	$seasons_menu = getSeasonsMenu();

	$page_title = 'Draugi';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>