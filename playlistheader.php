<?php
	session_start();
	include 'database.php';
    $song = $_GET[ 'song' ];
	$myid = $_SESSION[ 'id' ];
	$user_id = $_GET[ 'user_id' ];
	$song_upl = $_FILES[ "choose_song" ][ "name" ];
	$del_song_id = $_POST[ 'delete_song_id' ];
	$ext = substr($song_upl, -4);
	$perm = "music/" . $song_upl;
	$temp  = $_FILES[ 'choose_song' ][ 'tmp_name' ];
	if ( $del_song_id != "" ) {
		$get_song_name = mysql_query("SELECT playlist_song FROM playlists WHERE playlist_id=$del_song_id");
		$song_name = mysql_fetch_array($get_song_name);
		unlink('music/' . $song_name[ 'playlist_song' ]);
		$delete_song = mysql_query("DELETE FROM playlists WHERE playlist_id=$del_song_id LIMIT 1");
		header('Location: ?p=playlist');
	}
	if ( $ext == ".mp3" || $ext == ".MP3" || $ext == ".mP3" || $ext == ".Mp3" ) {
		move_uploaded_file( $temp, $perm );
		$add_song_db = mysql_query("INSERT INTO playlists ( playlist_id, playlist_userid, playlist_song ) VALUES ( NULL, $myid, '$song_upl')");
		$upload_song_done = true;
	}
	if ( $myid != "" ) {
		$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
		$user_infos = mysql_fetch_array($get_user_infos);
		if ( $user_id != "" ) {
			$get_user_infos1 = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$user_id");
			$user_infos1 = mysql_fetch_array($get_user_infos1);
		}
		$my_avatar = $user_infos[ 'user_avatar' ];
		$get_image_avatar = mysql_query("SELECT image_id FROM images WHERE image_location='$my_avatar'");
		$image_avatar = mysql_fetch_array($get_image_avatar);
	}
	include 'setonline.php';
?>