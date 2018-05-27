<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function addNewSeason($name){

    $dbh = getDBConnection();

    $stmt = $dbh->prepare("INSERT INTO seasons (name) VALUES (:name)");
    $stmt->bindValue(':name', $name);
    $stmt->execute();

    return true;
  }


?>
