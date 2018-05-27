<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/friendadd.php' );

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 && !empty( $_POST['name'] ) ){
      // add friend
      $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/friends/";

      $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
      $new_file_name = md5(time().rand(1,999)).'.'.$imageFileType;
      $target_file = $target_dir . $new_file_name;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
      $image = $new_file_name;

      $name = trim(strip_tags($_POST['name']));

      $url = '';
      if( isset($_POST['url']) && !empty($_POST['url']) ){
        $url = trim(strip_tags($_POST['url']));
      }

      $_SESSION['friend_add_form_values'] = array('name' => $name, 'url' => $url);

      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else if( strlen($url) > 255 ){
        $_SESSION['reg_form_errors'] = 'Saite nedrīkst pārsniegt 255 rakstzīmes!';
      }else{

        addFriendData($image, $name, $url);
        $_SESSION['form_success'] = 'ok';
        $_SESSION['friend_add_form_values'] = array();

      }

      header('Location: /admin/?c=friendadd');
      exit();

    }

  }

  $show_success = false;
  if( isset($_SESSION['form_success']) && $_SESSION['form_success'] == 'ok' ){
    unset($_SESSION['form_success']);
    $show_success = true;
  }

  $reg_form_errors = false;
  if( isset($_SESSION['reg_form_errors']) ){
    $reg_form_errors = $_SESSION['reg_form_errors'];
    unset($_SESSION['reg_form_errors']);
  }

  $friend_add_form_values = false;
  if( isset($_SESSION['friend_add_form_values']) ){
    $friend_add_form_values = $_SESSION['friend_add_form_values'];
    $_SESSION['friend_add_form_values'] = array();
    unset($_SESSION['friend_add_form_values']);
  }


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/friendadd.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'friends';

	$page_title = 'Pievienot draugu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
