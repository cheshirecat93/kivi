<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


  function checkUserByID($id){
    $dbh = getDBConnection();
    $stmt = $dbh->prepare("SELECT ID FROM users WHERE ID=:id");
    $stmt->execute( ['id' => $id ] );
    $user = $stmt->fetch();
    if( isset($user['ID']) && !empty($user['ID']) ){
      return true;
    }else{
      return false;
    }
  }

	function getUserData($id){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT users.ID AS ID, users.name, users.surname, users.email, users.status, users.role FROM users WHERE ID=:id LIMIT 1");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
		$user = $stmt->fetch();
		return $user;
	}


  function updateUserData($name, $surname, $email, $role, $status, $id){
    $dbh = getDBConnection();

    $stmt = $dbh->prepare("UPDATE users SET name = :name, surname = :surname, email = :email, role = :role, status = :status WHERE id = :id");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':role', $role);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return true;
  }


?>
