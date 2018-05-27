<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/users.php' );

	$users = getAllUsers($is_login);
  $statuses = array( 0 => 'Bloķets', 1 => 'Aktīvs' );
  $roles = array( 1 => 'Reģistrēts lietotājs', 2 => 'Moderators', 3 => 'Admins' );

  $seccess_msg = false;
  if( isset( $_SESSION['form_success_delete']) && !empty($_SESSION['form_success_delete']) ){
    $seccess_msg =  $_SESSION['form_success_delete'];
    unset($_SESSION['form_success_delete']);
  }

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/users.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'users';

	$page_title = 'Lietotāji';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );

?>
