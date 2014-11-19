<?php
	session_start();
	$user = $_SESSION[ 'administrator' ];
	include 'database.php';
	$result = mysql_query("SELECT note_id , note_userid, note_text
				FROM notes 
				WHERE note_userid='$user' ");
	while ($row = mysql_fetch_array($result)) {	
		echo $row[ 'note_text' ];
	}
?>
		