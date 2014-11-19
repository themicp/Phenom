<?php
	$user = $_GET[ 'profile_id' ];
	$getcommntid = $_GET[ 'comment_id' ];
	$getcomm = mysql_query("SELECT comment_id, comment_userid, comment_itemid , comment_text , comment_type, comment_time FROM comments WHERE comment_type='image' AND comment_itemid='$imageid' ");	
	$emoticons = array(':P' => '<img src="emoticons/tongue.gif" />',
						':(' => '<img src="emoticons/sad.gif" />',
						':)' => '<img src="emoticons/happy.gif" />',
						':D' => '<img src="emoticons/teeth.gif" />',
						':@' => '<img src="emoticons/angry.gif" />',
						'(L)' => '<img src="emoticons/love.gif" />',
						':kiss:' => '<img src="emoticons/kiss.gif" />',
						':x' => '<img src="emoticons/x.gif" />',
						':music:' => '<img src="emoticons/music.gif" />',
						':cool:' => '<img src="emoticons/cool.gif" />',
						';)' => '<img src="emoticons/eye.gif" />',
						':cry:' => '<img src="emoticons/cry.gif" />',
						':duh:' => '<img src="emoticons/duh.gif" />',
						'0o' => '<img src="emoticons/0o.gif" />',
						':S' => '<img src="emoticons/confused.gif" />',
						':shy:' => '<img src="emoticons/shy.gif" />');
	function str_replace_assoc($array,$string){
		$from_array = array();
		$to_array = array();
   
		foreach ($array as $k => $v){
			$from_array[] = $k;
			$to_array[] = $v;
		}
   
    return str_replace($from_array,$to_array,$string);
	}
	while ($comment = mysql_fetch_array($getcomm)) {
		include 'postedonincl.php';
		$togetsender = $comment[ 'comment_itemid' ];
		$getsender = mysql_query("SELECT image_userid FROM images WHERE image_id=$togetsender");
		$senderarray = mysql_fetch_array($getsender);
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
		$transform1 = htmlspecialchars( $comment[ 'comment_text' ] , ENT_QUOTES);
		$transform = str_replace_assoc($emoticons, $transform1);
		include 'imgcomms.php';
	}
?>