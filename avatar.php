<?php
	include 'database.php';
	$user = $_GET[ 'user_id' ];
	$avatar = mysql_query("SELECT user_id, user_name, user_firstname , user_lastname, user_avatar FROM users WHERE user_id='$user'");
	while ($myavatar = mysql_fetch_array($avatar)) { 
		$default = $myavatar[ 'user_avatar' ];
		$getimageid = mysql_query("SELECT image_id , image_userid , image_location FROM images WHERE image_userid=$user AND image_location='$default' ");
		$results = mysql_fetch_array($getimageid);
		if ( $myavatar[ 'user_avatar' ] != "" ) {
			echo '<a href="http://themis.kamibu.com/phenom/?p=gallery&id=' . $results[ 'image_id' ] . '"><img src="avatars/' . $myavatar[ 'user_avatar' ] . '" alt="' . $myavatar[ 'user_name' ] . '" class="profileavtr" /></a>';
		}
		else
		{
			echo '<img src="http://themis.kamibu.com/phenom/images/noimage.jpg"' . 'alt="' . $myavatar[ 'user_name' ] . '" class="profileavtr" />';
		}	
	}
?>