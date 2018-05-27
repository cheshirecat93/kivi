<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/seasonedit.php' );

  $id = trim($_GET['id']);

  if( !checkSeasonByID($id) ){
    header('Location: /admin?c=seasons');
    exit();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['name'] ) ){
      // update user
      $name = trim(strip_tags($_POST['name']));

      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else{

        updateSeasonData($name, $id);
        $_SESSION['form_success'] = 'ok';
      }


      header('Location: /admin/?c=seasonedit&id='.$id);
      exit();

    }

  }

	$season = getSeasonData($id);

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
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/seasonedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'seasons';

	$page_title = 'Rediģēt sezonu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
