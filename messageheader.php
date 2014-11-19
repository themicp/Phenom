<?php
	include 'database.php';
	$myid = $_SESSION[ 'id' ];
	if ( $myid != "" ) {
		$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
		$user_infos = mysql_fetch_array($get_user_infos);
	}
	$deletenew = mysql_query("DELETE FROM news WHERE new_comment=$messageid AND new_itemid=$myid AND new_type='pm' LIMIT 1");
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>