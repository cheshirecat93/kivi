<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function getContactsEmail(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT email FROM contacts ORDER BY ID ASC LIMIT 1");
		$stmt->execute();
		$email = $stmt->fetch();
		return $email['email'];
	}


?>
