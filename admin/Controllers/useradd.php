<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/useradd.php' );


  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['name'] ) && !empty( $_POST['surname']) && !empty( $_POST['email']) && !empty( $_POST['role']) && !empty( $_POST['password']) && !empty( $_POST['password2']) ){
      $password = trim(strip_tags($_POST['password']));
      $password2 = trim(strip_tags($_POST['password2']));

      $name = trim(strip_tags($_POST['name']));
      $surname = trim(strip_tags($_POST['surname']));
      $email = trim(strip_tags($_POST['email']));

      $role = trim(strip_tags($_POST['role']));
      if( trim(strip_tags($_POST['status'])) == 'on' ){
        $status = 1;
      }else{
        $status = 0;
      }

      $_SESSION['user_add_form_values'] = array('name' => $name, 'surname' => $surname, 'email' => $email, 'role' => $role, 'status' => $status);

      if( $password  != $password2 ){
        $_SESSION['form_error_pass'] = 'ok';
        header('Location: /admin/?c=useradd');
        exit();
      }


      if(checkIsUserRegistred($email)){
        $_SESSION['form_error_registred'] = 'ok';
        header('Location: /admin/?c=useradd');
        exit();
      }


      if( strlen($name) > 30 ){
        $_SESSION['add_user_form_errors'] = 'Vārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if( strlen($surname) > 30 ){
        $_SESSION['add_user_form_errors'] = 'Uzvārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if( strlen($password) < 6 ){
        $_SESSION['add_user_form_errors'] = 'Parolei jābūt garākai par 6 simboliem!';
      }else if( strlen($email) > 255 ){
        $_SESSION['add_user_form_errors'] = 'E-pasts jābūt garākai par 255 simboliem!';
      }else{

        $password = sha1($password);
        registerNewUser($name, $surname, $email, $password, $status, $role);

        $_SESSION['form_success'] = 'ok';
        $_SESSION['user_add_form_values'] = array();
      }


      header('Location: /admin/?c=useradd');
      exit();

    }

  }


  $show_success = false;
  if( isset($_SESSION['form_success']) && $_SESSION['form_success'] == 'ok' ){
    unset($_SESSION['form_success']);
    $show_success = true;
  }

  $show_error1 = false;
  if( isset($_SESSION['form_error_pass']) && $_SESSION['form_error_pass'] == 'ok' ){
    unset($_SESSION['form_error_pass']);
    $show_error1 = true;
  }

  $show_error2 = false;
  if( isset($_SESSION['form_error_registred']) && $_SESSION['form_error_registred'] == 'ok' ){
    unset($_SESSION['form_error_registred']);
    $show_error2 = true;
  }


  $reg_form_errors = false;
  if( isset($_SESSION['add_user_form_errors']) ){
    $reg_form_errors = $_SESSION['add_user_form_errors'];
    unset($_SESSION['add_user_form_errors']);
  }


  $user_add_form_values = false;
  if( isset($_SESSION['user_add_form_values']) ){
    $user_add_form_values = $_SESSION['user_add_form_values'];
    unset($_SESSION['user_add_form_values']);
  }



	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/useradd.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'users';

	$page_title = 'Pievienot lietotāju';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
