<?php
	session_start();
	include 'database.php';
	$now = getdate();
	$timestamp = $now['0'];
	$userid =  $_SESSION[ 'id' ];
	$userprof = $_GET[ 'user_id' ];
	$commentid = $_GET[ 'comment_id' ];
	$profile = $_GET[ 'user_id' ];
    $friend = $_POST[ 'add' ];
	$user_exists1 = false;
	$check_user_exists = mysql_query("SELECT user_name FROM users WHERE user_id=$profile");
	$user_name_check = mysql_fetch_array($check_user_exists);
	if ( $user_name_check != "" ) {
		$user_exists1 = true;
	}
	if ( $user_exists1 == false ) {
		header('Location: http://themis.kamibu.com/?p=home');
	}
	if ( $profile == "" || $profile < 1 ) {
		header('Location: http://themis.kamibu.com/?p=home');
	}
	include 'update_newsprof.php';
	$select = mysql_query("SELECT user_name, user_id , user_avatar
				FROM users 
				WHERE user_id=$userid ");
	while ($row = mysql_fetch_array($select)) {	
		$fromuser = $row[ 'user_name' ];
		$avatar = $row[ 'user_avatar' ];
	}
	include 'post_profile.php';	
	header( "Content-type: text/html; charset=utf-8" );
	$getinfo = mysql_query("SELECT user_name  FROM users WHERE user_id='$userprof'");
	while ($row = mysql_fetch_array($getinfo)) {
		$username = $row[ 'user_name' ];
	}
    if ( $userid != "" ) { 
		include 'get_topinfos.php';
		include 'add_userprof.php';
		include 'setonline.php';
    }
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
