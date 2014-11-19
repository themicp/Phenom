<?php
	include 'database.php';
	$user = $_SESSION[ 'id' ];
	$avatar = mysql_query("SELECT user_id, user_name, user_firstname , user_lastname, user_avatar FROM users WHERE user_id='$user'");
	while ($myavatar = mysql_fetch_array($avatar)) { 
		if ( $myavatar[ 'user_avatar' ] != "" ) {
			echo '<a href="?p=profile&user_id=' . $user . '"><img src="avatars/' . $myavatar[ 'user_avatar' ] . '" alt="' . $myavatar[ 'user_name' ] . '" class="profileavtr" /></a>';
		}
		else
		{
			echo '<a href="?p=profile&user_id=' . $user . '"><img src="avatars/noimage.jpg"' . 'alt="' . $myavatar[ 'user_name' ] . '" class="profileavtr" /></a>';
		}
	}
?>