<?php
	session_start();
	include 'database.php';
	$user = $_SESSION[ 'id' ];
	$about = mysql_query("SELECT user_id, user_name, user_firstname , user_lastname, user_about FROM users WHERE user_id='$user'");
	while ($aboutme = mysql_fetch_array($about)) { 
		echo $aboutme[ 'user_about' ];
	}
?>