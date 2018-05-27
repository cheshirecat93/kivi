<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

  if( !isset($_GET['id']) || empty($_GET['id']) ){
    header('Location: /admin?c=scenes');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/scenedel.php' );


  $id = trim($_GET['id']);

	deleteScene($id);
  $_SESSION['form_success_delete'] = 'Raidījuma sižets dzēsts!';

  header('Location: /admin?c=scenes');
  exit();


?>
