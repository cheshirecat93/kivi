<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/galleryadd.php' );

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 && !empty( $_POST['name'] ) && !empty( $_POST['description'] ) ){
      // add photo
      $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/gallery/";

      $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
      $new_file_name = md5(time().rand(1,999)).'.'.$imageFileType;
      $target_file = $target_dir . $new_file_name;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
      $image = $new_file_name;

      $name = trim(strip_tags($_POST['name']));
      $description = trim(strip_tags($_POST['description']));

      $_SESSION['gallery_add_form_values'] = array('name' => $name, 'description' => $description );

      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else if( strlen($description) > 100 ){
        $_SESSION['reg_form_errors'] = 'Apraksts nedrīkst pārsniegt 100 rakstzīmes!';
      }else{

        addPhotoData($image, $name, $description);
        $_SESSION['form_success'] = 'ok';
        $_SESSION['gallery_add_form_values'] = array();

      }

      header('Location: /admin/?c=galleryadd');
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

  $gallery_add_form_values = false;
  if( isset($_SESSION['gallery_add_form_values']) ){
    $gallery_add_form_values = $_SESSION['gallery_add_form_values'];
    $_SESSION['gallery_add_form_values'] = array();
    unset($_SESSION['gallery_add_form_values']);
  }


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/galleryadd.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'gallery';

	$page_title = 'Pievienot foto';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
