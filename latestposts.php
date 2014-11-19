<?php
	include 'database.php';
	$getlatest = mysql_query("SELECT comment_id, comment_text, comment_userid, comment_itemid, comment_type FROM comments ");
	$i = 0;
	$details = array();
	$latest1 = array();
	while ( $latest = mysql_fetch_array($getlatest) ) {
			$details = array('comment_text' => $latest[ 'comment_text' ],
							'comment_userid' => $latest[ 'comment_userid' ],
							'comment_itemid' => $latest[ 'comment_itemid' ],
							'comment_type' => $latest[ 'comment_type' ]);
			$latest1[ (int)$latest[ 0 ] ] = $details;
	}
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

   

	if ( $latest1 != "" ) {
		krsort($latest1);
		foreach ( $latest1 as $key => $values ) {
			$i = $i + 1;
			$fromid = $values[ 'comment_userid' ];
			$itemid = $values[ 'comment_itemid' ];
			$commenttxt1 = mb_substr($values[ 'comment_text' ], 0, 15);
			$commenttxt = str_replace_assoc($emoticons, $commenttxt1);
			if ( $i < 6 ) {
				$getsender = mysql_query("SELECT user_name, user_avatar FROM users WHERE user_id=$fromid ");
				$gettype = mysql_query("SELECT comment_type FROM comments WHERE comment_id=$key");
				$postsender = mysql_fetch_array($getsender);
				$commtype = mysql_fetch_array($gettype);
				echo '<div class="post"><a href="?p=profile&amp;user_id=' . $values[ 'comment_userid' ] . '"><div class="sender"><img src="avatars/';
				if ( $postsender[ 'user_avatar' ] != "" ) {
					echo $postsender[ 'user_avatar' ]; 
				}
				else if ( $postsender[ 'user_avatar' ] == "" ) {
					echo 'noimage.jpg';
				} 
				echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' .$results2[ 'user_name' ] . ' έγραψε : </span>' . '<div class="newpost"><span class="newposttxt">' . '"' . $commenttxt . '..."</span>';
				if ( $commtype[ 'comment_type' ] == "profile" ) {
					$getprofile = mysql_query("SELECT user_id , user_name, user_avatar FROM users WHERE user_id=$itemid");
					$postreciever = mysql_fetch_array($getprofile);
					echo ' <span class="poston">στο προφίλ του <div class="postonimg"><a href="http://themis.kamibu.com/?p=profile&amp;user_id=' . $postreciever[ 'user_id' ] . '&amp;comment_id=' . $key . '#' . $key . '"><img src="avatars/';
					if ( $postreciever[ 'user_avatar' ] != "" ) {
						echo $postreciever[ 'user_avatar' ]; 
					}
					else if ( $postreciever[ 'user_avatar' ] == "" ) {
						echo 'noimage.jpg';
					}  
					echo '" width="60" height="60" class="senderimg" /></a></div></span></div>' . '<div style="clear:both"> </div></div><br />';
				}
				else if ( $commtype[ 'comment_type' ] == "image" ) {
						$getimage = mysql_query("SELECT image_location , image_userid FROM images WHERE image_id='$itemid'");
						$image = mysql_fetch_array($getimage);
						echo ' <span class="poston">στην εικόνα <div class="postonimg"><a href="http://themis.kamibu.com/?p=gallery&amp;id=' . $values[ 'comment_itemid' ] . '&amp;comment_id=' . $key . '#' . $key . '"><img src="avatars/' . $image[ 'image_location' ] . '" width="60" height="60" class="senderimg" /></a></div></span></div>' . '<div style="clear:both"> </div></div><br />';
				}
			}
		}
	}
?>
