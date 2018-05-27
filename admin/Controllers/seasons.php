<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/seasons.php' );

	$seasons = getAllSeasons();

  $seccess_msg = false;
  if( isset( $_SESSION['form_success_delete']) && !empty($_SESSION['form_success_delete']) ){
    $seccess_msg =  $_SESSION['form_success_delete'];
    unset($_SESSION['form_success_delete']);
  }

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/seasons.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'seasons';

	$page_title = 'Sezoni';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );

?>
