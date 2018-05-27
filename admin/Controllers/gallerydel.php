<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

  if( !isset($_GET['id']) || empty($_GET['id']) ){
    header('Location: /admin?c=gallery');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/gallerydel.php' );


  $id = trim($_GET['id']);

	deletePhoto($id);
  $_SESSION['form_success_delete'] = 'Foto dzēsts!';

  header('Location: /admin?c=gallery');
  exit();


?>
