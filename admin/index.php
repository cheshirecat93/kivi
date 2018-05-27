<?php

	session_start();

	require_once( $_SERVER['DOCUMENT_ROOT'].'/funkc.php' );

  $is_login = checkLogin();
  $login_user_status = getLoggedInStatus();
  $login_user_role = getLoggedInRole();

  if( !$is_login ){
    header('Location: /');
    exit();
  }elseif($login_user_status != 1){
    header('Location: /');
    exit();
  }elseif($login_user_role == '1'){
    header('Location: /');
    exit();
  }

	$default_controller = 'Controllers/main.php';

	function getController($cid){

		if( file_exists('Controllers/'.$cid.'.php') ){
			return 'Controllers/'.$cid.'.php';
		}else{
			global $default_controller;
			return  $default_controller;
		}
	}

	//$_SESSION['login_id'] = '2';

	if( isset($_GET['c']) && !empty($_GET['c']) ){
		$controller = getController( trim($_GET['c']) );
	}else{
		$controller = $default_controller;
	}

	$login_user_name = getLoggedInUsername();


	require_once($controller);

?>
