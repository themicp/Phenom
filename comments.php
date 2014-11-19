<?php
	$user = $_GET[ 'user_id' ];
	$getcommntid = $_GET[ 'comment_id' ];
	$getcomm = mysql_query("SELECT comment_id, comment_userid, comment_itemid , comment_text , comment_type, comment_time FROM comments WHERE comment_itemid='$user' AND comment_type='profile' ");
	include 'emoticons_replace.php';
	while ($comment = mysql_fetch_array($getcomm)) { 
		include 'postedonincl.php';
		$sender = $comment[ 'comment_userid' ];
		$getuserinf = mysql_query( " SELECT 
					user_id , 
					user_name , 
					user_avatar
				            FROM 
					users
				           WHERE
					user_id='$sender'
			 	         ");
		$results2 = mysql_fetch_array($getuserinf);
		$transform = htmlspecialchars( $comment[ 'comment_text' ] , ENT_QUOTES);
		$commenttxt1 = htmlspecialchars_decode( $transform , ENT_QUOTES);
		$commenttxt = str_replace_assoc($emoticons, $commenttxt1);
		include 'comms.php';
	}
?>