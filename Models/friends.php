<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function getAllFriends(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT friends.ID AS ID, friends.image, friends.name, friends.url FROM friends ORDER BY friends.ID DESC");
		$stmt->execute();
		$friends = $stmt->fetchAll();
		return $friends;
	}

?>
