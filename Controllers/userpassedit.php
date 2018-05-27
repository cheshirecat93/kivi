<?php

	$is_login = checkLogin();

	if( !$is_login ){
		header('Location: /');
	}

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/userpassedit.php' );

	$reg_form_errors = array();
	$reg_form_status = array();


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//FORM SUBMITTED

		if( !empty( $_POST['password'] ) && !empty( $_POST['new_password']) && !empty( $_POST['new_password2']) ){
			$new_password = trim(strip_tags($_POST['new_password']));
			$new_password2 = trim(strip_tags($_POST['new_password2']));
			if( $new_password == $new_password2 ){
				$password = trim(strip_tags($_POST['password']));

				if(strlen($password) < 6 ){
 						$reg_form_errors[] = 'Parolei jābūt garākai par 6 simboliem!';
 				}else{
 					$id = $_SESSION['login_id'];
					if( checkCurrPassword( sha1($password), $id ) ){
						// update user
						updateUserPasswords( sha1($new_password), $id);
						$reg_form_status[] = 'Dati saglabāti';
					}else{
						$reg_form_errors[] = 'Nepareiza parole';
					}
 				}

			}else{
				$reg_form_errors[] = 'Paroles nesakrit';
			}

		}else{
			$reg_form_errors[] = 'Visi lauki ir obligāti';
		}

	}


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/userpassedit.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'register';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>
