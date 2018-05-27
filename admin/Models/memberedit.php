<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkMemberByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM members WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $member = $stmt->fetch();
    if( isset($member['ID']) && !empty($member['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getMemberData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT members.ID AS ID, members.image, members.name, members.description, members.season_id FROM members WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$member = $stmt->fetch();
		return $member;
	}


  function updateMemberData($image, $name, $description, $season_id, $id){
    $dbh = getDBConnection();

    if($image){
      $stmt = $dbh->prepare("UPDATE members SET image = :image, name = :name, description = :description, season_id = :season_id WHERE id = :id");
      $stmt->bindValue(':image', $image);
    }else{
      $stmt = $dbh->prepare("UPDATE members SET name = :name, description = :description, season_id = :season_id WHERE id = :id");
    }

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
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

  function getCurrentImage($id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("SELECT members.image FROM members WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $image = $stmt->fetch();

    return $image['image'];

  }

?>
