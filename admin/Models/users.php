<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllUsers($cur_id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT users.ID AS ID, users.name, users.surname, users.email, users.status, users.role FROM users");
		//$stmt->bindValue(':cur_id', (int)$cur_id, PDO::PARAM_INT);
    $stmt->execute();
		$users = $stmt->fetchAll();
		return $users;
	}


?>
