<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function checkIsUserRegistred($email){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID FROM users WHERE email = :email LIMIT 1");
		$stmt->execute( ['email' => $email ] );
		$user = $stmt->fetch();
		if( !empty($user['ID']) ){
			return true;
		}else{
			return false;
		}
	}

	function registerNewUser($name, $surname, $email, $password, $status, $role){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("INSERT INTO users (name, surname, email, password, status, role) VALUES (:name, :surname, :email, :password, :status, :role)");
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':surname', $surname);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $password);
		$stmt->bindValue(':status', $status);
		$stmt->bindValue(':role', $role);
		$stmt->execute();
		$id = $dbh->lastInsertId();
		return $id;
	}

?>
