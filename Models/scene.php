<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/config/db.php' );


	function checkSceneByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT ID FROM scenes WHERE ID=:id");
		$stmt->execute( ['id' => $id ] );
		$scene = $stmt->fetch();
		if( isset($scene['ID']) && !empty($scene['ID']) ){
			return true;
		}else{
			return false;
		}
	}

	function getSceneDataByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT scenes.ID AS ID, title, youtube, text, rating, season_id, categories, counter, seasons.name AS season_name FROM scenes LEFT JOIN seasons ON scenes.season_id = seasons.ID WHERE scenes.ID=:id");
		$stmt->execute( ['id' => $id ] );
		$scene = $stmt->fetch();
		return $scene;
	}

	function incrementSceneCounterByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("UPDATE scenes SET counter = counter +1 WHERE scenes.ID=:id");
		$stmt->execute( ['id' => $id ] );
		$scene = $stmt->fetch();
		return true;
	}

	function getSceneCommentsCountByID($id){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT ID FROM comments WHERE scenes_id=:id");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}

	function getSceneCommentsByID($id, $page){
		$page = $page * 5;
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("SELECT comments.ID AS id, user_id, timestamp, text, users.name AS user_name, users.surname AS user_surname FROM comments LEFT JOIN users ON comments.user_id = users.ID WHERE scenes_id=:id ORDER BY comments.ID DESC LIMIT :page , 5");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
		$stmt->bindValue(':page', (int)$page, PDO::PARAM_INT);
		$stmt->execute();
		$comments = $stmt->fetchAll();
		return $comments;
	}

	function addNewComment($id, $user_id, $comment_text){
		$dbh = getDBConnection();
		$stmt = $dbh->prepare("INSERT INTO comments (scenes_id, user_id, text, timestamp) VALUES (:id, :user_id, :comment_text, :timestamp)");
		$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
		$stmt->bindValue(':user_id', (int)$user_id, PDO::PARAM_INT);
		$stmt->bindValue(':comment_text', $comment_text, PDO::PARAM_STR);
		$stmt->bindValue(':timestamp', time(), PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}

?>
