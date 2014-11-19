<?php
    include 'database.php';
	session_start();
    $albumid = $_GET[ 'id' ];
	$myid = $_SESSION[ 'id' ];
    $get_images = mysql_query("SELECT * FROM images WHERE image_album=$albumid");
	$get_owner = mysql_query("SELECT album_owner FROM albums WHERE album_id=$albumid");
	$owner = mysql_fetch_array($get_owner);
	if ( $owner == "" ) {	
		header('Location: ?p=home');
	}
	$get_owner_info = mysql_query("SELECT * FROM users WHERE user_id=" . $owner[ 'album_owner' ]);
	$owner_info = mysql_fetch_array($get_owner_info);
    $images_exist = false;
	$album_delete = $_POST[ 'delete_albumid' ];
	if ( $album_delete != "" ) {
		$get_album_info = mysql_query("SELECT album_owner, album_default FROM albums WHERE album_id=$album_delete");
		$album_info = mysql_fetch_array($get_album_info);
		if ( $myid == $album_info[ 'album_owner' ] && $album_info[ 'album_default' ] == 0 ) {
            $get_images_todelete = mysql_query("SELECT image_location, image_id FROM images WHERE image_album=$album_delete");
            while ( $images_todelete = mysql_fetch_array($get_images_todelete) ) {
                unlink('avatars/' . $images_todelete[ 'image_location' ]);
                $remove_dbrow = mysql_query("DELETE FROM images WHERE image_id=" . $images_todelete[ 'image_id' ] . " LIMIT 1");
                $check_for_avatar = mysql_query("SELECT user_avatar FROM users WHERE user_id=$myid");
                $avatar_check = mysql_fetch_array($check_for_avatar);
                if ( $avatar_check[ 'user_avatar' ] == $images_todelete[ 'image_location' ] ) {
                    $clear_avatar = mysql_query("UPDATE users SET user_avatar='' WHERE user_id=$myid");
                }
            }
			$delete_album = mysql_query("DELETE FROM albums WHERE album_id=$album_delete LIMIT 1");
			$error_delete_album = false;
			header('Location: ?p=albums&id=' . $myid);
		}
		else { 
			$error_delete_album = true;
		}
	}
    if ( $myid != "" ) { 
		include 'get_topinfos.php';
		include 'setonline.php';
    }
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
