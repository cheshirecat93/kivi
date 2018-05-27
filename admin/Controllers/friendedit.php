<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/friendedit.php' );

  $id = trim($_GET['id']);

  if( !checkFriendByID($id) ){
    header('Location: /admin?c=friends');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_POST['name'] ) ){
      // update friend

      if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 ){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/friends/";

        $currrent_image = getCurrentImage($id);
        unlink($target_dir.$currrent_image);

        $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
        $new_file_name = md5(time().rand(1,999)).'.'.$imageFileType;
        $target_file = $target_dir . $new_file_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $new_file_name;
      }else{
        $image = $false;
      }

      $name = trim(strip_tags($_POST['name']));

      $url = '';
      if( isset($_POST['url']) && !empty($_POST['url']) ){
        $url = trim(strip_tags($_POST['url']));
      }

      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else if( strlen($url) > 255 ){
        $_SESSION['reg_form_errors'] = 'Saite nedrīkst pārsniegt 255 rakstzīmes!';
      }else{

        updateFriendData($image, $name, $url, $id);
        $_SESSION['form_success'] = 'ok';

      }


      header('Location: /admin/?c=friendedit&id='.$id);
      exit();

    }

  }

	$friend = getFriendData($id);

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


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/friendedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'friends';

	$page_title = 'Rediģēt draugu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
