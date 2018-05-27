<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getLastScenes(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT scenes.ID AS ID, scenes.title, scenes.youtube, scenes.text, scenes.timestamp, COUNT(comments.ID) AS comments_count FROM scenes LEFT JOIN comments ON scenes.ID = comments.scenes_id GROUP BY scenes.ID DESC LIMIT 4");
		$stmt->execute(); 
		$scenes = $stmt->fetchAll();
		return $scenes;
	}


?>