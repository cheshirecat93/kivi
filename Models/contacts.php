<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getContactsAllData(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID, facebook, youtube, instagram, latitude, longitude, email, address FROM contacts ORDER BY ID ASC LIMIT 1");
		$stmt->execute();
		return $stmt->fetch();
	}


?>
