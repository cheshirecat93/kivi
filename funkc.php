<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );

	function getLoggedInUsername(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT name, surname FROM users WHERE ID = :id LIMIT 1");
		$stmt->execute( ['id' => $_SESSION['login_id'] ] );
		$user = $stmt->fetch();
		return $user['name'].' '.$user['surname'];
	}

	function getLoggedInStatus(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT status FROM users WHERE ID = :id LIMIT 1");
		$stmt->execute( ['id' => $_SESSION['login_id'] ] );
		$user = $stmt->fetch();
		return $user['status'];
	}

	function getLoggedInRole(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT role FROM users WHERE ID = :id LIMIT 1");
		$stmt->execute( ['id' => $_SESSION['login_id'] ] );
		$user = $stmt->fetch();
		return $user['role'];
	}

	function checkLogin(){

		if( isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ){
			return $_SESSION['login_id'];
		}else{
			return false;
		}
	}

	function getSeasonsMenu(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT ID,name FROM seasons ORDER BY ID DESC");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getContactsData(){

		$dbh = getDBConnection();

		$stmt = $dbh->prepare("SELECT facebook, youtube, instagram, latitude, longitude, email, address FROM contacts ORDER BY ID ASC LIMIT 1");
		$stmt->execute();
		return $stmt->fetch();
	}

?>
