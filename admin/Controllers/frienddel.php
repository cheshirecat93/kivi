<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  if( !isset($_GET['id']) || empty($_GET['id']) ){
    header('Location: /admin?c=friends');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/frienddel.php' );


  $id = trim($_GET['id']);

	deleteFriend($id);
  $_SESSION['form_success_delete'] = 'Draugs dzēsts!';

  header('Location: /admin?c=friends');
  exit();


?>
