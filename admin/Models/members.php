<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllMembers(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT members.ID AS ID, members.name, members.season_id, seasons.name AS season_name FROM members LEFT JOIN seasons ON members.season_id = seasons.ID ORDER BY ID DESC");
    	$stmt->execute();
		$members = $stmt->fetchAll();
		return $members;
	}


?>
