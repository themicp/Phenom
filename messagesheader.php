<?php
	$reciever = htmlspecialchars($_POST[ 'reciever' ], ENT_QUOTES);
	$sender = $_SESSION[ 'id' ];
	$subject = htmlspecialchars($_POST[ 'subject' ], ENT_QUOTES);
	$message_text = htmlspecialchars($_POST[ 'message_text' ], ENT_QUOTES);
	$now = getdate();
	$timestamp = $now[ 0 ];
	$message_recieverid = true;
	include 'database.php';
	if ( $sender != "" ) { 
		$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
		$user_infos = mysql_fetch_array($get_user_infos);
	}
	if ( $reciever != "" && $subject != "" && $message_text != "" ) {
		$checkreciever = mysql_query("SELECT user_id, user_name FROM users WHERE user_name='$reciever'");
		$recieverid = mysql_fetch_array($checkreciever);
		$message_reciever = $recieverid[ 'user_id' ];
		if ( $recieverid[ 'user_id' ] == "" ) {
			$message_recieverid = false;
			$pmsent = false;
		}
		else {
			if ( $recieverid[ 'user_id' ] != "" ) {
				$sendpm = mysql_query("INSERT INTO messages ( message_id, message_reciever, message_sender, message_subject, message_text, message_time ) VALUES ( NULL, '$message_reciever', '$sender', '$subject', '$message_text', $timestamp )");
				$getnewpmid = mysql_query("SELECT message_id FROM messages WHERE message_time=$timestamp");
				$newpmid = mysql_fetch_array($getnewpmid);
				$pmid = $newpmid[ 'message_id' ];
				$addnewpm = mysql_query("INSERT INTO news ( new_id, new_fromuser, new_itemid, new_type, new_time, new_comment ) VALUES ( NULL, '$sender', '$message_reciever', 'pm', '$timestamp', '$pmid' )");
				$pmsent = true;
			}
		}
	}
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';

?>