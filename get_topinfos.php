<?php
	session_start();
	$myid = $_SESSION[ 'id' ];
	$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
	$user_infos = mysql_fetch_array($get_user_infos);
?>