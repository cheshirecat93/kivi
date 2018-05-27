<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/useredit.php' );

  $id = trim($_GET['id']);

  if( !checkUserByID($id) ){
    header('Location: /admin?c=users');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['name'] ) && !empty( $_POST['surname']) && !empty( $_POST['email']) && !empty( $_POST['role']) ){
      // update user
      $name = trim(strip_tags($_POST['name']));
      $surname = trim(strip_tags($_POST['surname']));
      $email = trim(strip_tags($_POST['email']));
      $role = trim(strip_tags($_POST['role']));
      if( trim(strip_tags($_POST['status'])) == 'on' ){
        $status = 1;
      }else{
        $status = 0;
      }

      if( strlen($name) > 30 ){
        $_SESSION['edit_user_form_errors'] = 'Vārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if( strlen($surname) > 30 ){
        $_SESSION['edit_user_form_errors'] = 'Uzvārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if( strlen($email) > 255 ){
        $_SESSION['edit_user_form_errors'] = 'E-pasts jābūt garākai par 255 simboliem!';
      }else{

        updateUserData($name, $surname, $email, $role, $status, $id);

        $_SESSION['form_success'] = 'ok';

      }


      header('Location: /admin/?c=useredit&id='.$id);
      exit();

    }

  }

	$user = getUserData($id);

  $show_success = false;
  if( isset($_SESSION['form_success']) && $_SESSION['form_success'] == 'ok' ){
    unset($_SESSION['form_success']);
    $show_success = true;
  }

  $reg_form_errors = false;
  if( isset($_SESSION['edit_user_form_errors']) ){
    $reg_form_errors = $_SESSION['edit_user_form_errors'];
    $_SESSION['edit_user_form_errors'] = array();
    unset($_SESSION['edit_user_form_errors']);
  }



	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/useredit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'users';

	$page_title = 'Rediģēt lietotāju';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
