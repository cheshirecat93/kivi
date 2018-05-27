<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function checkSeasonByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT ID FROM seasons WHERE ID=:id");
		$stmt->execute( ['id' => $id ] ); 
		$season = $stmt->fetch();
		if( isset($season['ID']) && !empty($season['ID']) ){
			return true;
		}else{
			return false;
		}
	}

	function getSeasonNameByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT name FROM seasons WHERE ID=:id");
		$stmt->execute( ['id' => $id ] ); 
		$season = $stmt->fetch();
		return $season['name'];
	}

	function getAllScenes($id){

		$dbh = getDBConnection();

		if($id){
			$stmt = $dbh->prepare("SELECT scenes.ID AS ID, scenes.title, scenes.youtube, scenes.text, scenes.timestamp, scenes.rating, scenes.counter FROM scenes WHERE scenes.season_id=:id ORDER BY scenes.ID DESC");
			$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
		}else{
			$stmt = $dbh->prepare("SELECT scenes.ID AS ID, scenes.title, scenes.youtube, scenes.text, scenes.timestamp, scenes.rating, scenes.counter FROM scenes ORDER BY scenes.ID DESC");
		}

		$stmt->execute(); 
		$scenes = $stmt->fetchAll();
		return $scenes;
	}

?>