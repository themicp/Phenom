<?php
	session_start();
	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];
	include 'database.php';
	if ( $username != "" && $password != "" ) {
		$result = mysql_query( "SELECT user_id, user_name, user_password, user_mail, user_firstname, user_lastname FROM users WHERE user_name='$username' AND user_password='$password' " );
		$row = mysql_fetch_array( $result );
		if ( $username == $row[ 'user_name' ] && $password == $row[ 'user_password' ] ) {
			header('Location: ?p=home');
			$_SESSION[ 'id' ] = $row[ 'user_id' ];
			$loggedin = true;
			break;
		}
		else {
			$loggedin = false;
		}
	}
?>