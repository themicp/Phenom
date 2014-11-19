<?php
	session_start();
	$user = $_SESSION[ 'administrator' ];
	$content = $_POST[ 'note' ];
	include 'database.php';
	$check = sprintf("SELECT * FROM notes WHERE note_userid='$user'");
	$query = sprintf(" UPDATE `notes` SET `note_text` = '$content' WHERE `notes`.`note_userid` = '$user'; ");
	$query1 = sprintf("INSERT INTO notes ( note_id, note_userid, note_text ) VALUES ( NULL, '$user', '$content' )");
	if ( $content != "" ) {
		$check_get = mysql_query($check);
		$check_res = mysql_fetch_array($check_get);
		if ( $check_res == "" || $check_res == false ) {
			$create = mysql_query($query1);
		}
		else {
			$result = mysql_query($query);
		}
	}
?>