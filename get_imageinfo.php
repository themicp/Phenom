<?php
    $getopened = mysql_query(" SELECT image_location , image_userid, image_album FROM images WHERE image_id=$imageid " );
    $opened = mysql_fetch_array($getopened);
    $getimages = mysql_query(" SELECT image_id , image_userid , image_location FROM images WHERE image_userid=$profileid AND image_album=" . $opened[ 'image_album' ] );
    $getinfo = mysql_query("SELECT user_avatar ,user_id, user_firstname, user_lastname , user_name  FROM users WHERE user_id='$profileid'");
	while ($row = mysql_fetch_array($getinfo)) {
		$firstname = $row[ 'user_firstname' ];
		$lastname = $row[ 'user_lastname' ];
		$fullname = $firstname . " " . $lastname;
		$useravatar = $row[ 'user_avatar' ];
		$username = $row[ 'user_name' ];
	}
?>