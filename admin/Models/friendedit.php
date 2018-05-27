<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkFriendByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM friends WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $friend = $stmt->fetch();
    if( isset($friend['ID']) && !empty($friend['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getFriendData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT friends.ID AS ID, friends.image, friends.name, friends.url FROM friends WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$friend = $stmt->fetch();
		return $friend;
	}


  function updateFriendData($image, $name, $url, $id){
    $dbh = getDBConnection();

    if($image){
      $stmt = $dbh->prepare("UPDATE friends SET image = :image, name = :name, url = :url WHERE id = :id");
      $stmt->bindValue(':image', $image);
    }else{
      $stmt = $dbh->prepare("UPDATE friends SET name = :name, url = :url WHERE id = :id");
    }

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':url', $url);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }


  function getCurrentImage($id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("SELECT friends.image FROM friends WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $image = $stmt->fetch();

    return $image['image'];

  }

?>
