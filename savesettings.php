<?php
	session_start();
	$filenm = $_FILES[ "file" ][ "name" ];
	$ext = substr($filenm, -4);
	//$name = rand(1, 1000000000000000000) . $filenm;
	$perm = "avatars/" . $filenm;
	$temp  = $_FILES[ 'file' ][ 'tmp_name' ];
	$uploader = $_SESSION[ 'id' ];
	if ( $filenm != "" ) {	
		if ( $ext == ".jpg" || $ext== ".png" || $ext== ".bmp" || $ext== ".jpeg" || $ext== ".tif" || $ext== ".tiff" || $ext== ".jpe" || $ext== ".dib" || $ext == ".JPG" || $ext== ".PNG" || $ext== ".BMP" || $ext== ".JPEG" || $ext== ".TIF" || $ext== ".TIFF" || $ext== ".JPE" || $ext== ".DIB" || $ext == ".gif" || $ext == ".GIF") {			
			move_uploaded_file( $temp, $perm );
			$location = 'http://themis.kamibu.com/' . $perm ;
		}
		else
		{
		echo "<br />Wrong image file type.";
		}
	}
	$firstname = $_POST[ 'firstname' ];
	$lastname = $_POST[ 'lastname' ];
	$msn = $_POST[ 'msn' ];
	$skype = $_POST[ 'skype' ];
	$age = $_POST[ 'age' ];
	$gmail = $_POST[ 'gmail' ];
	$page = $_POST[ 'page' ];
	$user = $_SESSION[ 'id' ];
	$about = $_POST[ 'about' ];
	$password = $_POST[ 'password' ];
	$twitter = $_POST[ 'twitter' ];
	include 'database.php';
	$check_albums = mysql_query("SELECT * FROM albums WHERE album_owner=$user");
	$album_res = mysql_fetch_array($check_albums);
	$select = mysql_query("SELECT user_id
				FROM users ");
	$success = true;		
	if ( $location != "" ) {
		if ( $album_res == "" ) {
			$add_album = mysql_query("INSERT INTO albums ( album_id, album_owner, album_name, album_default) VALUES ( NULL, $user, 'Εγώ', 1 )");
		}
		$get_default_album = mysql_query("SELECT album_id FROM albums WHERE album_owner=$user AND album_default=1");
		$default_album = mysql_fetch_array($get_default_album);
		$allinfo = mysql_query("UPDATE `users`
				SET user_firstname='$firstname', user_lastname='$lastname', user_about='$about' , user_avatar='$filenm', user_msn='$msn', user_skype='$skype', user_twitter='$twitter', user_page='$page' , user_gmail='$gmail' , user_age='$age', user_password='$password'
				WHERE user_id='$user' "
				);
		$allinfo = mysql_query("INSERT INTO images (
					image_id ,
					image_userid ,
                    image_album ,
					image_location )
				VALUES ( NULL , '$user', " . $default_album[ 'album_id' ] . " , '$filenm' ) "
				);
		header("Location: http://themis.kamibu.com/?p=profile&user_id=$user");	
		}
		else
		{
			if ( $avatar == "" ) {
				$halfinfo = sprintf("UPDATE `users`
					SET user_firstname='$firstname', user_lastname='$lastname',user_about='$about', user_msn='$msn', user_skype='$skype',user_twitter='$twitter', user_page='$page' , user_gmail='$gmail' , user_age='$age', user_password='$password'
					WHERE user_id='$user' "
				);
				$result = mysql_query($halfinfo);
				header("Location: http://themis.kamibu.com/?p=profile&user_id=$user");
			}
		}
	
?>

