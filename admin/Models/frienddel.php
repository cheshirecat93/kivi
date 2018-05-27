<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deleteFriend($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM friends WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $friend = $stmt->fetch();
    return true;
  }

?>
