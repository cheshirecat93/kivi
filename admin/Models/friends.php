<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllFriends(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT friends.ID AS ID, friends.name FROM friends ORDER BY ID DESC");
    	$stmt->execute();
		$friends = $stmt->fetchAll();
		return $friends;
	}


?>
