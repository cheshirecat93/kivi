<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function getAboutData(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID, image, text FROM about ORDER BY ID ASC LIMIT 1");
    $stmt->execute();
		$about = $stmt->fetch();
		return $about;
	}


  function updateAboutData($id, $image, $text){
    $dbh = getDBConnection();

    if($image){
      $stmt = $dbh->prepare("UPDATE about SET image = :image, text = :text WHERE id = :id");
      $stmt->bindValue(':image', $image);
    }else{
      $stmt = $dbh->prepare("UPDATE about SET text = :text WHERE id = :id");
    }

    $stmt->bindValue(':text', $text);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }


  function getCurrentImage($id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("SELECT about.image FROM about WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $image = $stmt->fetch();

    return $image['image'];

  }

?>
