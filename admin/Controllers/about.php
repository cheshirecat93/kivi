<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/about.php' );

  $about = getAboutData();
  $id = $about['ID'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_POST['text'] ) ){
      // update about

      if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 ){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/about/";

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

      $text = trim(strip_tags($_POST['text']));

      updateAboutData($id, $image, $text);

      $_SESSION['form_success'] = 'ok';
      header('Location: /admin/?c=about');
      exit();

    }

  }



  $show_success = false;
  if( isset($_SESSION['form_success']) && $_SESSION['form_success'] == 'ok' ){
    unset($_SESSION['form_success']);
    $show_success = true;
  }


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/about.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'about';

	$page_title = 'Rediģet par mums sadaļu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
