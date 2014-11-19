<?php
	$album_name = $_POST[ 'album_name' ];
	session_start();
	$myid = $_SESSION[ 'id' ];
	include 'database.php';
	$add_album = mysql_query("INSERT INTO albums ( album_id, album_owner, album_name ) VALUES ( NULL, $myid, '$album_name')");
	header('Location: http://themis.kamibu.com/?p=albums&id=' . $myid);
?>