<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAllPhotos(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT gallery.ID AS ID, gallery.name FROM gallery ORDER BY ID DESC");
    	$stmt->execute();
		$photos = $stmt->fetchAll();
		return $photos;
	}


?>
