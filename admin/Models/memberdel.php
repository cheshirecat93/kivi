<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function deleteMember($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("DELETE FROM members WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $member = $stmt->fetch();
    return true;
  }

?>
