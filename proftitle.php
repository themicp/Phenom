<?php 
	session_start();
	$user = $_GET['user_id'];
	include 'database.php';
	$result = mysql_query("SELECT user_id, user_firstname, user_lastname FROM users WHERE user_id='$user' ");
	while ($row = mysql_fetch_array($result)) {
		echo $row[1] . " " . $row[2] . " | Phenom";
	}
?>