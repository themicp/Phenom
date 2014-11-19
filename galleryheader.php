<?php
	session_start();
    include 'database.php';
	$imageid = $_GET[ 'id' ];
	if ( $imageid == "" ) {
		header("Location: http://themis.kamibu.com/?p=home");
	}
	$getprofile = mysql_query("SELECT image_userid FROM images WHERE image_id=$imageid");
	$profile = mysql_fetch_array($getprofile);
	$now = getdate();
	$timestamp = $now['0'];
    $myid = $_SESSION[ 'id' ];
    $profileid = $profile[ 'image_userid' ];
    $setdefault = $_GET[ 'set_default'];
    $commentid = $_GET[ 'comment_id' ];
	$message = $_POST[ 'message' ];
	$move_opt = $_POST[ 'album' ];
	if ( $move_opt != "" ) {
		$move_picture = mysql_query("UPDATE images SET image_album=$move_opt WHERE image_id=$imageid");
	}
	$select = mysql_query("SELECT user_name, user_id , user_avatar
				FROM users 
				WHERE user_id='$myid' ");
	while ($row = mysql_fetch_array($select)) {	
		$touser = $row[ 'user_name' ];
		$avatar = $row[ 'user_avatar' ];
	}
	include 'post_imgcomm.php';
	include 'update_newsimg.php';
    if ( $setdefault != "" ) {
        $selectimage = mysql_query(" SELECT image_location FROM images WHERE image_id=$setdefault ");
        $results2 = mysql_fetch_array($selectimage);
        $location = $results2[0];
        $set = mysql_query(" UPDATE users SET user_avatar='$location' WHERE user_id=$myid ");
    }
    if ( $profileid == "" || $profileid < 1 ) {
        header('Location: http://themis.kamibu.com/?p=home');
    }
	include 'get_imageinfo.php';
    if ( $myid != "" ) { 
		include 'get_topinfos.php';
		include 'setonline.php';
		include 'get_uploaderimg.php';
    }
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
