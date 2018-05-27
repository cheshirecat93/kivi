<?php

	$is_login = checkLogin();

	if( $is_login ){
		header('Location: /');
	}	

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/login.php' );

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//FORM SUBMITTED
		if( !empty( $_POST['email'] ) && !empty( $_POST['password'] ) ){
			$email = trim(strip_tags($_POST['email']));
		 	$password = sha1(trim(strip_tags($_POST['password'])));
			checkLoginForm($email, $password);
		}
	}

	header('Location: /');

?>