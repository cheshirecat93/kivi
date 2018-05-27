<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function checkLoginForm($email, $password){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID, status FROM users WHERE email = :email AND password = :password LIMIT 1");
		$stmt->execute( [ 'email' => $email, 'password' => $password ] );
		$user = $stmt->fetch();
		if( !empty($user['ID']) && $user['status'] == 1 ){
			$_SESSION['login_id'] = $user['ID'];
			return true;
		}else{
			return false;
		}
	}


?>
