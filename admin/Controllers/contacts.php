<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/contacts.php' );

  $contacts = getContactsAllData();
  $id = $contacts['ID'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['facebook'] ) && !empty( $_POST['youtube'] ) && !empty( $_POST['instagram'] ) && !empty( $_POST['latitude'] ) && !empty( $_POST['longitude'] ) && !empty( $_POST['email'] ) && !empty( $_POST['address'] ) ){
      // update contacts

      $facebook = trim(strip_tags($_POST['facebook']));
      $youtube = trim(strip_tags($_POST['youtube']));
      $instagram = trim(strip_tags($_POST['instagram']));
      $latitude = trim(strip_tags($_POST['latitude']));
      $longitude = trim(strip_tags($_POST['longitude']));
      $email = trim(strip_tags($_POST['email']));
      $address = trim(strip_tags($_POST['address']));

      updateContactsData($id, $facebook, $youtube, $instagram, $latitude, $longitude, $email, $address);

      $_SESSION['form_success'] = 'ok';
      header('Location: /admin/?c=contacts');
      exit();

    }

  }



  $show_success = false;
  if( isset($_SESSION['form_success']) && $_SESSION['form_success'] == 'ok' ){
    unset($_SESSION['form_success']);
    $show_success = true;
  }


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/contacts.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'contacts';

	$page_title = 'Rediģet kontakti sadaļu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
