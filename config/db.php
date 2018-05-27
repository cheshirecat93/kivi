<?php

function getDBConnection(){

	$host = 'localhost';
	$dbname = 'kivi';
	$user = 'root';
	$pass = '';

	try {
	    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
	    return $dbh;
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}

}

?>
