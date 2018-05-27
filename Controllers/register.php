<?php

	$is_login = checkLogin();

	if( $is_login ){
		header('Location: /');
	}

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/register.php' );

	$reg_form_errors = array();
	$reg_form_status = array();


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//FORM SUBMITTED

		if( !empty( $_POST['name'] ) && !empty( $_POST['surname'] ) && !empty( $_POST['email'] )
		 && !empty( $_POST['password'] ) && !empty( $_POST['password_confirm']) ){

		 	//unset($_SESSION['reg_form_values']);

		 	$password = trim(strip_tags($_POST['password']));
			$password_confirm = trim(strip_tags($_POST['password_confirm']));
			$email = trim(strip_tags($_POST['email']));
			$name = trim(strip_tags($_POST['name']));
 			$surname = trim(strip_tags($_POST['surname']));

 			$_SESSION['reg_form_values'] = array('email' => $email, 'name' => $name, 'surname' => $surname);
			if( $password == $password_confirm ){
				if( !checkIsUserRegistred($email) ){
 					// register new user
 					$role = 1;
 					$status = 1;

 					if( strlen($name) > 30 ){
 						$reg_form_errors[] = 'Vārds nedrīkst pārsniegt 30 rakstzīmes!';
 					}else if( strlen($surname) > 30 ){
 						$reg_form_errors[] = 'Uzvārds  nedrīkst pārsniegt 30 rakstzīmes!';
 					}else if( strlen($password) < 6 ){
 						$reg_form_errors[] = 'Parolei jābūt garākai par 6 simboliem!';
 					}else{
 						$password = sha1($password);
 						$id = registerNewUser($name, $surname, $email, $password, $status, $role);
 						$_SESSION['login_id'] = $id;
 						$reg_form_status[] = 'Lietotājs reģistrēts';
 						$_SESSION['reg_form_values'] = array();
 						header('Location: /');
 						exit();
 					}

				}else{
					$reg_form_errors[] = 'Lietotājs jau ir reģistrēts';
				}
			}else{
				$reg_form_errors[] = 'Paroles nesakrīt';
			}

		}else{
			$reg_form_errors[] = 'Visi lauki ir obligāti';
		}

	}



	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/register.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'register';

	$seasons_menu = getSeasonsMenu();

	$page_title = 'Reģistrācija';


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>
