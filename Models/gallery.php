<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function getAllImages(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT gallery.ID AS ID, gallery.image, gallery.name, gallery.description FROM gallery ORDER BY gallery.ID DESC");
		$stmt->execute(); 
		$images = $stmt->fetchAll();
		return $images;
	}

?>