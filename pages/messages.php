<?php
	$act = $_GET[ 'act' ];
	include 'setonline.php';
	if ( $act == "" || $act == "inbox" ) {
		include 'pages/inbox.php';
	}
	if ( $act == "sent" ) {
		include 'pages/sent.php';
	}
	if ( $act == "new" ) {
		include 'pages/newmessage.php';
	}
?>