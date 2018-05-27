<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deleteUser($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM users WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $user = $stmt->fetch();
    return false;
  }

?>
