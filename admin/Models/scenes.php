<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllScenes(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT scenes.ID AS ID, scenes.title, scenes.season_id, seasons.name AS season_name FROM scenes LEFT JOIN seasons ON scenes.season_id = seasons.ID ORDER BY ID DESC");
    $stmt->execute();
		$scenes = $stmt->fetchAll();
		return $scenes;
	}


?>
