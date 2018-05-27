<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  if( !isset($_GET['id']) || empty($_GET['id']) ){
    header('Location: /admin?c=members');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/memberdel.php' );


  $id = trim($_GET['id']);

	deleteMember($id);
  $_SESSION['form_success_delete'] = 'Biedrs dzēsts!';

  header('Location: /admin?c=members');
  exit();


?>
