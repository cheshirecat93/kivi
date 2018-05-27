<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deletePhoto($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM gallery WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $photo = $stmt->fetch();
    return true;
  }

?>
