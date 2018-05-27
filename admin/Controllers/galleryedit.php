<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/galleryedit.php' );

  $id = trim($_GET['id']);

  if( !checkPhotoByID($id) ){
    header('Location: /admin?c=gallery');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_POST['name'] ) && !empty( $_POST['description'] ) ){
      // update photo

      if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 ){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/gallery/";

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
      $description = trim(strip_tags($_POST['description']));


      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else if( strlen($description) > 100 ){
        $_SESSION['reg_form_errors'] = 'Apraksts nedrīkst pārsniegt 100 rakstzīmes!';
      }else{

        updatePhotoData($image, $name, $description, $id);

        $_SESSION['form_success'] = 'ok';

      }


      header('Location: /admin/?c=galleryedit&id='.$id);
      exit();

    }

  }

	$photo = getPhotoData($id);

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
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/galleryedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'gallery';

	$page_title = 'Rediģēt foto';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
