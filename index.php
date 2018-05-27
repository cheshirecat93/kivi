<?php

	session_start();

	require_once( $_SERVER['DOCUMENT_ROOT'].'/funkc.php' );

	$default_controller = 'Controllers/main.php';

	function getController($cid){

		if( file_exists('Controllers/'.$cid.'.php') ){
			return 'Controllers/'.$cid.'.php';
		}else{
			global $default_controller;
			return  $default_controller;
		}
	}

	if( isset($_GET['c']) && !empty($_GET['c']) ){
		$controller = getController( trim($_GET['c']) );
	}else{
		$controller = $default_controller;
	}

	$is_login = checkLogin();

	if($is_login){
		$login_user_name = getLoggedInUsername();
	}else{
		$login_user_name = 'Viesis';
	}

	$contacts_data = getContactsData();

	require_once($controller);

?>
