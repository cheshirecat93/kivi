<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function addFriendData($image, $name, $url){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("INSERT INTO friends (image, name, url) VALUES (:image, :name, :url)");
    $stmt->bindValue(':image', $image);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':url', $url);
    $stmt->execute();

    return true;
  }


?>
