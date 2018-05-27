<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/memberadd.php' );

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if( !empty( $_FILES['image'] ) && $_FILES['image']['size'] > 0 && !empty( $_POST['name'] ) && !empty( $_POST['description'] ) && !empty( $_POST['season_id'] ) ){
      // add member
      $target_dir = $_SERVER['DOCUMENT_ROOT']."/files/members/";

      $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
      $new_file_name = md5(time().rand(1,999)).'.'.$imageFileType;
      $target_file = $target_dir . $new_file_name;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

      $image = $new_file_name;
      $name = trim(strip_tags($_POST['name']));
      $description = trim(strip_tags($_POST['description']));
      $season_id = trim(strip_tags($_POST['season_id']));

      $_SESSION['member_add_form_values'] = array('name' => $name, 'description' => $description, 'season_id' => $season_id);

      if( strlen($name) > 30 ){
        $_SESSION['reg_form_errors'] = 'Vārds, Uzvārds nedrīkst pārsniegt 30 rakstzīmes!';
      }else if(strlen($description) > 400){
        $_SESSION['reg_form_errors'] = 'Apraksts nedrīkst pārsniegt 400 rakstzīmes!';
      }else{

        addMemberData($image, $name, $description, $season_id);
        $_SESSION['form_success'] = 'ok';
        $_SESSION['member_add_form_values'] = array();

      }

      header('Location: /admin/?c=memberadd');
      exit();

    }

  }

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

  $member_add_form_values = false;
  if( isset($_SESSION['member_add_form_values']) ){
    $member_add_form_values = $_SESSION['member_add_form_values'];
    $_SESSION['member_add_form_values'] = array();
    unset($_SESSION['member_add_form_values']);
  }


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/memberadd.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'members';

	$page_title = 'Pievienot biedru';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
