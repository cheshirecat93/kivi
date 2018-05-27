<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deleteScene($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM scenes WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $scene = $stmt->fetch();
    return true;
  }

?>
