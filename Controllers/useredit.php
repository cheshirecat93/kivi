<?php

	$is_login = checkLogin();

	if( !$is_login ){
		header('Location: /');
	}

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/useredit.php' );

	$reg_form_errors = array();
	$reg_form_status = array();


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//FORM SUBMITTED

		if( !empty( $_POST['name'] ) && !empty( $_POST['surname']) ){

			// update user
			$name = trim(strip_tags($_POST['name']));
			$surname = trim(strip_tags($_POST['surname']));
			if( strlen($name) > 30 ){
				$reg_form_errors[] = 'Vārds nedrīkst pārsniegt 30 rakstzīmes!';
			}else if( strlen($surname) > 30 ){
				$reg_form_errors[] = 'Uzvārds  nedrīkst pārsniegt 30 rakstzīmes!';
			}else{
				$id = $_SESSION['login_id'];
				updateUserData($name, $surname, $id);
				$reg_form_status[] = 'Dati saglabāti';
			}

		}else{
			$reg_form_errors[] = 'Visi lauki ir obligāti';
		}

	}

	$current_user_data = getUserData($_SESSION['login_id']);


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/useredit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'register';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>
