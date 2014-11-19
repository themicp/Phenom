<?php
	include 'database.php';
	session_start();
	$myid = $_SESSION[ 'id' ];
	$chatmessage = $_POST[ 'chatmessage' ];
	if ( $chatmessage != "" ) {
		$sendmessage = mysql_query("INSERT INTO chat ( 
									chat_id, 
									chat_message, 
									chat_userid 
									)
									VALUES ( 
									NULL , 
									'$chatmessage', 
									'$myid') 
									");
		header('Location: /?p=home');
	}
?>
	