<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Models/contacts.php' );

  function getChannelID($url){
    $url = explode("/", $url);
    if( empty(end($url)) ){
      $index = count($url) -2;
      return $url[ $index ];
    }else{
      return end($url);
    }
  }

	$contacts_data = getContactsAllData();

  $contacts_data['youtube_id'] = getChannelID($contacts_data['youtube']);
  $contacts_data['instagram_id'] = getChannelID($contacts_data['instagram']);
  $contacts_data['facebook_id'] = getChannelID($contacts_data['facebook']);


	ob_start();
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/contacts.tpl.php' );
	$body = ob_get_clean();

	$cur_manu_id = 'contacts';
	$seasons_menu = getSeasonsMenu();

	$page_title = 'Kontakti';

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Views/blank.tpl.php' );

?>
