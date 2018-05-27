<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function addPhotoData($image, $name, $description){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("INSERT INTO gallery (image, name, description) VALUES (:image, :name, :description)");
    $stmt->bindValue(':image', $image);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->execute();

    return true;
  }


?>
