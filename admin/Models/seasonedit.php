<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkSeasonByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM seasons WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $season = $stmt->fetch();
    if( isset($season['ID']) && !empty($season['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getSeasonData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT seasons.ID AS ID, seasons.name FROM seasons WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$season = $stmt->fetch();
		return $season;
	}


  function updateSeasonData($name, $id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("UPDATE seasons SET name = :name WHERE id = :id");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }


?>
