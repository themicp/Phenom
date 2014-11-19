<?php
	if ( $getcommntid == $comment[ 'comment_id' ] ) {
		if ( $secondsdiff <= 60 ) {
				echo '<div class="comment"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"><div class="sender"><img src="avatars/';
				if ( $results2[ 'user_avatar' ] != "" ) {
					echo $results2[ 'user_avatar' ]; 
				}
				else if ( $results2[ 'user_avatar' ] == "" ) {
					echo 'noimage.jpg';
				}
				echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' . $results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $secondsdiff;
				if ( $secondsdiff == 1 ) {
					echo " δευτερόλεπτο";
				}
				else {
					echo " δευτερόλεπτα";
				}
				echo ".</span>" . '<span class="message">' . '<strong id="' . $comment[ 'comment_id' ] . '">' . "$commenttxt</span>" . '</strong><div style="clear:both"> </div></div><br />';
		}
		if ( $minutesdiff <= 60 && $minutesdiff >= 1  ) {
			$numbers = $minutesdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " λεπτά";
			$ago_labelone = " λεπτό";
		}
		if ( $hoursdiff <= 24 && $hoursdiff >= 1 ) {
			$numbers = $hoursdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " ώρες";
			$ago_labelone = " ώρα";
		}
		if ( $daysdiff <= 30 && $daysdiff >= 1 ) {
			$numbers = $daysdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μέρες";
			$ago_labelone = " μέρα";
		}
		if ( $monthsdiff <= 12 && $monthsdiff >= 1 ) {
			$numbers = $monthsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μήνες";
			$ago_labelone = " μήνα";
		}
		if ( $yearsdiff >= 1 ) {
			$numbers = $yearsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " χρόνια";
			$ago_labelone = " χρόνο";
		}
		if ( $final >= 1 ) {
			echo '<div class="comment"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"><div class="sender"><img src="avatars/';
			if ( $results2[ 'user_avatar' ] != "" ) {
				echo $results2[ 'user_avatar' ]; 
			}
			else if ( $results2[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}
			echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' .$results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $final;
			if ( $final == 1 ) {
				echo $ago_labelone;
			}
			else {
				echo $ago_label;
			}
			echo ".</span>" . '<span class="message">' . '<strong id="' . $comment[ 'comment_id' ] . '">' . "$commenttxt</span>" . '</strong><div style="clear:both"> </div></div><br />';	
		}
	}
	else {
		if ( $secondsdiff <= 60 ) {
			echo '<div class="comment"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"><div class="sender"><img src="avatars/';
			if ( $results2[ 'user_avatar' ] != "" ) {
				echo $results2[ 'user_avatar' ]; 
			}
			else if ( $results2[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}
			echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' . $results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $secondsdiff;
			if ( $secondsdiff == 1 ) {
				echo " δευτερόλεπτο";
			}
			else {
				echo " δευτερόλεπτα";
			}
			echo ".</span>" . '<span class="message">' . '<span id="' . $comment[ 'comment_id' ] . '">' . "$commenttxt</span>" . '</span><div style="clear:both"> </div></div><br />';
		}
		if ( $minutesdiff <= 60 && $minutesdiff >= 1  ) {
			$numbers = $minutesdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " λεπτά";
			$ago_labelone = " λεπτό";
		}
		if ( $hoursdiff <= 24 && $hoursdiff >= 1 ) {
			$numbers = $hoursdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " ώρες";
			$ago_labelone = " ώρα";
		}
		if ( $daysdiff <= 30 && $daysdiff >= 1 ) {
			$numbers = $daysdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μέρες";
			$ago_labelone = " μέρα";
		}
		if ( $monthsdiff <= 12 && $monthsdiff >= 1 ) {
			$numbers = $monthsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μήνες";
			$ago_labelone = " μήνα";
		}
		if ( $yearsdiff >= 1 ) {
			$numbers = $yearsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " χρόνια";
			$ago_labelone = " χρόνο";
		}
		if ( $final >= 1 ) {
			echo '<div class="comment"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"><div class="sender"><img src="avatars/';
			if ( $results2[ 'user_avatar' ] != "" ) {
				echo $results2[ 'user_avatar' ]; 
			}
			else if ( $results2[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}
			echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' .$results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $final;
			if ( $final == 1 ) {
				echo $ago_labelone;
			}
			else {
				echo $ago_label;
			}
			echo ".</span>" . '<span class="message">' . '<span id="' . $comment[ 'comment_id' ] . '">' . "$commenttxt</span>" . '</span><div style="clear:both"> </div></div><br />';	
		}
	}
?>