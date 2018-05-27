<?php

  if($login_user_role != '3'){
    header('Location: /admin');
    exit();
  }

  require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Models/seasonadd.php' );


  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( !empty( $_POST['name'] ) ){

      $name = trim(strip_tags($_POST['name']));

      $_SESSION['season_add_form_values'] = array('name' => $name);

      if( strlen($name) > 255 ){
        $_SESSION['reg_form_errors'] = 'Nosaukums nedrīkst pārsniegt 255 rakstzīmes!';
      }else{

        addNewSeason($name);
        $_SESSION['form_success'] = 'ok';
        $_SESSION['season_add_form_values'] = array();

      }


      header('Location: /admin/?c=seasonadd');
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

  $season_add_form_values = false;
  if( isset($_SESSION['season_add_form_values']) ){
    $season_add_form_values = $_SESSION['season_add_form_values'];
    $_SESSION['season_add_form_values'] = array();
    unset($_SESSION['season_add_form_values']);
  }

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/seasonadd.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'seasons';

	$page_title = 'Pievienot sezonu';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/admin/Views/blank.tpl.php' );


?>
