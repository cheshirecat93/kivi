<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/howto.php' );

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$admin_email = getContactsEmail();
		//FORM SUBMITTED
		if( !empty( $_POST['email'] ) && !empty( $_POST['name_surname'] ) && !empty( $_POST['message'] ) ){
		 	$email = trim(strip_tags($_POST['email']));
		 	$name_surname = trim(strip_tags($_POST['name_surname']));
		 	$message = trim(strip_tags($_POST['message']));
			$to = $admin_email;
			$subject = "KIVI pieteikums";
			$txt = "Jauns pieteikums no KIVI mājaslapas:</ br> ";
			$txt .= "E-pasts: ".$email."</ br> ";
			$txt .= "Vārds un Uzvārds: ".$name_surname."</ br> ";
			$txt .= "Ziņas: ".$message."</ br> ";
			$headers = "From: ".$email. "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to,$subject,$txt,$headers);
			$_SESSION['mail_sended'] = 'ok';
			header('Location: /?c=howto');
			exit();
		}
	}

	$show_form = true;
	if( isset($_SESSION['mail_sended']) && $_SESSION['mail_sended'] == 'ok' ){
		unset($_SESSION['mail_sended']);
		$show_form = false;
	}

	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/howto.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'howto';
	$seasons_menu = getSeasonsMenu();

	$page_title = 'Kā pievienoties KIVI?';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>
