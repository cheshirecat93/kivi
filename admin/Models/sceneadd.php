<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function addSceneData($title, $youtube, $text, $categories, $rating, $season_id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("INSERT INTO scenes (title, youtube, text, categories, rating, season_id) VALUES (:title, :youtube, :text, :categories, :rating, :season_id)");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':youtube', $youtube);
    $stmt->bindValue(':text', $text);
    $stmt->bindValue(':categories', $categories);
    $stmt->bindValue(':rating', $rating);
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
