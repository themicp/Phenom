<?php
	if ( $message != "" && $myid != $profileid ) {
		$insertnew = mysql_query("INSERT INTO news (
			new_id ,
			new_fromuser ,
			new_itemid , 
			new_type , 
			new_time
			)
			VALUES (
			NULL , '$myid' , '$imageid' , 'image', '$timestamp' )"
			);
		$query = mysql_query("INSERT INTO `comments` (
			`comment_id` ,
			`comment_userid` ,
			`comment_text` , 
			`comment_useravtr`, 
			comment_type , 
			comment_itemid , 
			comment_time
			)
			VALUES (
			NULL , '$myid', '$message', '$avatar' , 'image' , '$imageid' , '$timestamp')"
			);	
		$gettime = mysql_query("SELECT comment_id
								FROM comments
							WHERE comment_time = '$timestamp'");
		$gettimeres = mysql_fetch_array($gettime);
		$resid = $gettimeres[ 'comment_id' ];
		$idadd = mysql_query(" UPDATE news 
								SET new_comment='$resid'
								WHERE new_time = '$timestamp' ");
		header("Location: http://themis.kamibu.com/?p=gallery&id=$imageid");
	}
	if ( $message != "" && $myid == $profileid ) {
		$newmessage = str_replace($keyword, $icon, $message);
		$query = mysql_query("INSERT INTO `comments` (
			`comment_id` ,
			`comment_userid` ,
			`comment_text` , 
			`comment_useravtr`, 
			comment_type , 
			comment_itemid , 
			comment_time 
			)
			VALUES (
			NULL , '$myid', '$message', '$avatar' , 'image' , '$imageid', '$timestamp')"
			);	
		header("Location: http://themis.kamibu.com/?p=gallery&id=$imageid");
	}
?>