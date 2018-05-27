<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkSceneByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM scenes WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $scene = $stmt->fetch();
    if( isset($scene['ID']) && !empty($scene['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getSceneData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT scenes.ID AS ID, scenes.title, scenes.youtube, scenes.text, scenes.season_id, scenes.categories, scenes.rating FROM scenes WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$scene = $stmt->fetch();
		return $scene;
	}


  function updateSceneData($title, $youtube, $text, $categories, $rating, $season_id, $id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("UPDATE scenes SET title = :title, youtube = :youtube, text = :text, categories = :categories, rating = :rating, season_id = :season_id WHERE id = :id");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':youtube', $youtube);
    $stmt->bindValue(':text', $text);
    $stmt->bindValue(':categories', $categories);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':season_id', $season_id);
    $stmt->bindValue(':id', $id);
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
