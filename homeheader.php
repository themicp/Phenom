<?php
	include 'database.php';
	$myid = $_SESSION[ 'id' ];
    $accept = $_GET[ 'accept' ];
    $decline = $_GET[ 'decline' ];
	if ( $myid != "" ) {
		include 'friendship_update.php';
		include 'setonline.php';
		include 'get_topinfos.php';
		$my_avatar = $user_infos[ 'user_avatar' ];
		$get_image_avatar = mysql_query("SELECT image_id FROM images WHERE image_location='$my_avatar'");
		$image_avatar = mysql_fetch_array($get_image_avatar);
	}
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
