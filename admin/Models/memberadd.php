<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

  function addMemberData($image, $name, $description, $season_id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("INSERT INTO members (image, name, description, season_id) VALUES (:image, :name, :description, :season_id)");

    $stmt->bindValue(':image', $image);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':season_id', $season_id);
    $stmt->execute();

    return true;
  }

  function getAllSeasons(){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("SELECT seasons.ID, seasons.name FROM seasons ORDER BY ID DESC");
    $stmt->execute();
    $seasons = $stmt->fetchAll();

    return $seasons;
  }

?>
