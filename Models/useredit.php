<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function updateUserData($name, $surname, $id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("UPDATE users SET name = :name, surname = :surname WHERE id = :id");
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':surname', $surname);
		$stmt->bindValue(':id', $id);
		$stmt->execute();

		return true;
	}

	function getUserData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT name, surname, email FROM users WHERE ID = :id");
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$cur_user_data = $stmt->fetch();

		return $cur_user_data;
	}


?>