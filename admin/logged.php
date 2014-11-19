<?php
	session_start();
	$user = $_SESSION['administrator'];
	include 'database.php';
	$result = mysql_query("SELECT user_id, user_firstname, user_lastname FROM users WHERE user_id='$user'");
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		echo '<span id="loggeduser">Logged in as <strong>' . "$row[1] $row[2]</strong></span>";
	}
	mysql_free_result($result);
?>