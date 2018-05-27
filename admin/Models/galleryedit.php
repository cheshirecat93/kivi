<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkPhotoByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM gallery WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $photo = $stmt->fetch();
    if( isset($photo['ID']) && !empty($photo['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getPhotoData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT gallery.ID AS ID, gallery.image, gallery.name, gallery.description FROM gallery WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$photo = $stmt->fetch();
		return $photo;
	}


  function updatePhotoData($image, $name, $description, $id){
    $dbh = getDBConnection();

    if($image){
      $stmt = $dbh->prepare("UPDATE gallery SET image = :image, name = :name, description = :description WHERE id = :id");
      $stmt->bindValue(':image', $image);
    }else{
      $stmt = $dbh->prepare("UPDATE gallery SET name = :name, description = :description WHERE id = :id");
    }

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }


  function getCurrentImage($id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("SELECT gallery.image FROM gallery WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $image = $stmt->fetch();

    return $image['image'];

  }

?>
