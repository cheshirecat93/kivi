<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function updateUserPasswords($new_password, $id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("UPDATE users SET password = :password WHERE id = :id");
		$stmt->bindValue(':password', $new_password);
		$stmt->bindValue(':id', $id);
		$stmt->execute();

		return true;
	}

	function checkCurrPassword($password, $id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT password FROM users WHERE ID = :id");
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$cur_pass = $stmt->fetch();

		if( !empty( $cur_pass['password'] ) && $cur_pass['password'] == $password ){
			return true;
		}else{
			return false;
		}
	}


?>