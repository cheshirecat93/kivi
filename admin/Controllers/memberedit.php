<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/memberedit.php' );

  $id = trim($_GET['id']);

  if( !checkMemberByID($id) ){
    header('Location: /admin?c=members');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_POST['name'] ) && !empty( $_POST['description'] ) && !empty( $_POST['season_id'] ) ){
      // update member

      if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 ){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/members/";

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
      $season_id = trim(strip_tags($_POST['season_id']));

      if( strlen($name) > 30 ){
        $_SESSION['reg_form_errors'] = 'Vārds, Uzvārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if(strlen($description) > 400){
        $_SESSION['reg_form_errors'] = 'Apraksts nedrīkst pārsniegt 400 rakstzīmes!';
      }else{

        updateMemberData($image, $name, $description, $season_id, $id);
        $_SESSION['form_success'] = 'ok';

      }
      header('Location: /admin/?c=memberedit&id='.$id);
      exit();

    }

  }

	$member = getMemberData($id);
  $seasons = getAllSeasons();

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
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/memberedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'members';

	$page_title = 'Rediģēt biedri';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
