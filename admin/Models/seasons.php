<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllSeasons(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT seasons.ID AS ID, seasons.name FROM seasons ORDER BY ID DESC");
    $stmt->execute();
		$seasons = $stmt->fetchAll();
		return $seasons;
	}


?>
