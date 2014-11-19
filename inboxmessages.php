<?php
	include 'database.php';
	$myid = $_SESSION[ 'id' ];
	$getinbox = mysql_query("SELECT * FROM messages WHERE message_reciever=$myid");
	while ( $inbox = mysql_fetch_array($getinbox)) {
		$senderid = $inbox[ 'message_sender' ];
		$recieverid = $inbox[ 'message_reciever' ];
		$getsender = mysql_query("SELECT user_name, user_id FROM users WHERE user_id=$senderid");
		$sender = mysql_fetch_array($getsender);
		$getreciever = mysql_query("SELECT user_name, user_id FROM users WHERE user_id=$recieverid");
		$reciever = mysql_fetch_array($getreciever);
		include 'showinbox.php';
	}
?>