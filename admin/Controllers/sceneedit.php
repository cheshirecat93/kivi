<?php

  if($login_user_role == '1'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/sceneedit.php' );

  $id = trim($_GET['id']);

  if( !checkSceneByID($id) ){
    header('Location: /admin?c=scenes');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['title'] ) && !empty( $_POST['youtube'] ) && !empty( $_POST['text'] ) && !empty( $_POST['categories'] ) && !empty( $_POST['rating'] ) && !empty( $_POST['season_id'] ) ){
      // update scene
      $title = trim(strip_tags($_POST['title']));
      $youtube = trim(strip_tags($_POST['youtube']));
      $text = trim(strip_tags($_POST['text']));
      $categories = trim(strip_tags($_POST['categories']));
      $rating = (int)trim(strip_tags($_POST['rating']));
      $season_id = trim(strip_tags($_POST['season_id']));

      $url = parse_url($youtube);

      if( strlen($title) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else if( strlen($text) > 400 ){
        $_SESSION['reg_form_errors'] = 'Teksts nedrīkst pārsniegt 400 rakstzīmes!';
      }else if( strlen($categories) > 255 ){
        $_SESSION['reg_form_errors'] = 'Kategorijas jābūt garākai par 255 simboliem!';
      }else if( $url['host'] != 'www.youtube.com' && $url['host'] != 'youtube.com' ){
        $_SESSION['reg_form_errors'] = 'Youtube saite ir nepareiza';
      }else{

        updateSceneData($title, $youtube, $text, $categories, $rating, $season_id, $id);
        $_SESSION['form_success'] = 'ok';
        $_SESSION['scene_add_form_values'] = array();
      }

      header('Location: /admin/?c=sceneedit&id='.$id);
      exit();

    }

  }

	$scene = getSceneData($id);
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
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/sceneedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'scenes';

	$page_title = 'Rediģēt sižetu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
