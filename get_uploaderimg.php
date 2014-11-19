<?php
	$getuserbyimage = mysql_query("SELECT image_userid FROM images WHERE image_id=$imageid");
	$userbyimage = mysql_fetch_array($getuserbyimage);
	$useridbyimg = $userbyimage[ 'image_userid' ];
	$getuploaderinfo = mysql_query("SELECT user_id, user_avatar, user_name FROM users WHERE user_id=$useridbyimg");
	$uploaderinfo = mysql_fetch_array($getuploaderinfo);
?>