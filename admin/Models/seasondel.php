<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deleteSeason($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM seasons WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $season = $stmt->fetch();
    return true;
  }

?>
