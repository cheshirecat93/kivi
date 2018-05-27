<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/scenes.php' );

	$scenes = getAllScenes();

  $seccess_msg = false;
  if( isset( $_SESSION['form_success_delete']) && !empty($_SESSION['form_success_delete']) ){
    $seccess_msg =  $_SESSION['form_success_delete'];
    unset($_SESSION['form_success_delete']);
  }

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/scenes.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'scenes';

	$page_title = 'Raidījuma sižeti';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );

?>
