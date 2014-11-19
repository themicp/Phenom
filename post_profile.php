<?php
	$profile = $_GET[ 'user_id' ];
	$userid =  $_SESSION[ 'id' ];
	$enteredtxt = $_POST[ 'message' ];
	$message = htmlspecialchars( $enteredtxt , ENT_QUOTES );
	$success = false;
	$now = getdate();
	$timestamp = $now['0'];
	if ( $message != "" && $profile != $userid ) {
		$newmessage = str_replace($keyword, $icon, $message);
			$insertnew = mysql_query("INSERT INTO news (
			new_id ,
			new_itemid ,
			new_fromuser , 
			new_type,
			new_time
			)
			VALUES (
			NULL , '$profile' , '$userid' , 'profile', '$timestamp')"
			);
		$query = mysql_query("INSERT INTO `comments` (
				`comment_id` ,
				`comment_itemid` ,
				`comment_userid` ,
				`comment_text` , 
				`comment_useravtr`,
				comment_type,
				comment_time
				)
				VALUES (
				NULL , '$profile', '$userid', '$newmessage', '$avatar', 'profile', '$timestamp' )"
				);	
		$gettime = mysql_query("SELECT comment_id
								FROM comments
							WHERE comment_time = '$timestamp'");
		$gettimeres = mysql_fetch_array($gettime);
		$resid = $gettimeres[ 'comment_id' ];
		$idadd = mysql_query(" UPDATE news 
								SET new_comment='$resid'
								WHERE new_time = '$timestamp' ");
		$success = true;
	}	
	else if ( $message != "" && $profile == $userid ) {
		$newmessage = str_replace($keyword, $icon, $message);
			$query = mysql_query("INSERT INTO `comments` (
					`comment_id` ,
					`comment_itemid` ,
					`comment_userid` ,
					`comment_text` , 
					`comment_useravtr`,
					comment_type,
					comment_time
					)
					VALUES (
					NULL , '$profile', '$userid', '$newmessage', '$avatar', 'profile', '$timestamp')"
					);	
			$success = true;
	}	
	if ( $success == true ) {
		header("Location: http://themis.kamibu.com/phenom/?p=profile&user_id=$profile");
	}
?>