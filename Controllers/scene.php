<?php


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/scene.php' );

	$id = trim($_GET['id']);

	if( !checkSceneByID($id) ){
		header('Location: /?c=scenes');
		exit();
	}

	$is_login = checkLogin();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//FORM SUBMITTED
		if( !empty( $_POST['comment_text'] ) ){
		 	$comment_text = trim(strip_tags($_POST['comment_text']));
		 	$user_id = $is_login;
			addNewComment($id, $user_id, $comment_text);
			header('Location: /?c=scene&id='.$id);
			exit();
		}
	}


	incrementSceneCounterByID($id);
	$scene_data = getSceneDataByID($id);

	$comment_page = 0;
	if( isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page']) ){
		$comment_page = $_GET['page'];
	}
	$comments_data = getSceneCommentsByID($id, $comment_page);
	$comments_count = getSceneCommentsCountByID($id);

	parse_str( parse_url( $scene_data['youtube'], PHP_URL_QUERY ), $youtube );
	$scene_data['youtube_id'] = $youtube['v'];

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/scene.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'scenes';
	$cur_menu_season_id = $scene_data['season_id'];

	$seasons_menu = getSeasonsMenu();

	$page_title = $scene_data['title'];


	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>