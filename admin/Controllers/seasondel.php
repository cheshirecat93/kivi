<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  if( !isset($_GET['id']) || empty($_GET['id']) ){
    header('Location: /admin?c=seasons');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/seasondel.php' );

  $id = trim($_GET['id']);

	deleteSeason($id);
  $_SESSION['form_success_delete'] = 'Sezons dzēsts!';

  header('Location: /admin?c=seasons');
  exit();


?>
