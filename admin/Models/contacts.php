<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function getContactsAllData(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID, facebook, youtube, instagram, latitude, longitude, email, address FROM contacts ORDER BY ID ASC LIMIT 1");
    $stmt->execute();
		$contacts = $stmt->fetch();
		return $contacts;
	}


  function updateContactsData($id, $facebook, $youtube, $instagram, $latitude, $longitude, $email, $address){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("UPDATE contacts SET facebook = :facebook, youtube = :youtube, instagram = :instagram, latitude = :latitude, longitude = :longitude, email = :email, address = :address WHERE id = :id");
    $stmt->bindValue(':facebook', $facebook);
    $stmt->bindValue(':youtube', $youtube);
    $stmt->bindValue(':instagram', $instagram);
    $stmt->bindValue(':latitude', $latitude);
    $stmt->bindValue(':longitude', $longitude);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }

?>
