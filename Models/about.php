<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getAboutData(){

		$dbh = getDBConnection();
		
		$stmt = $dbh->prepare("SELECT image, text FROM about ORDER BY ID ASC LIMIT 1");
		$stmt->execute(); 
		return $stmt->fetch();
	}


?>