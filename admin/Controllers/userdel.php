<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/userdel.php' );

  $id = trim($_GET['id']);

  if( $id == $is_login ){
    header('Location: /admin?c=users');
    exit();
  }


	$user = deleteUser($id);
  $_SESSION['form_success_delete'] = 'Lietotājs dzēsts!';
  header('Location: /admin?c=users');
  exit();


?>
