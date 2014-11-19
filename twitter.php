<?php
	session_start();
	$myid = $_SESSION[ 'id' ];
	if ( $myid != "" ) {
		if ( $myid == '1' ) {
			include 'twitter/twitter.php';
		}
	}
	else {
		include 'pages/loginform.php';
	}
?>