<?php
	include 'database.php';
	$user = $_GET[ 'user_id' ];
	$about = mysql_query("SELECT user_id, user_name, user_firstname , user_lastname, user_about FROM users WHERE user_id='$user' LIMIT 1");
	$aboutme = mysql_fetch_array( $about );
	echo $aboutme[ 'user_about' ];
?>