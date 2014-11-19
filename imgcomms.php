<?php
	if ( $getcommntid == $comment[ 'comment_id' ] ) {
		if ( $secondsdiff < 61 ) {
			echo '<div class="imgcomment"><div class="sender"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"<img src="avatars/';
			if ( $results2[ 'user_avatar' ] != "" ) {
				echo $results2[ 'user_avatar' ]; 
			}
			else if ( $results2[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}			
			echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' .$results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $secondsdiff ;
			if ( $secondsdiff == 1 ) {
				echo " δευτερόλεπτο";
			}
			else {
				echo " δευτερόλεπτα";
			}
			echo ".</span" . '<span class="message"><strong id="' . $comment[ 'comment_id' ] . '">' . $transform . '</strong></span><div style="clear:both"> </div></div><br />';
		}
		if ( $minutesdiff < 61 && $minutesdiff > 0.9  ) {
			$numbers = $minutesdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " λεπτά";
			$ago_labelone = " λεπτό";
		}
		if ( $hoursdiff < 25 && $hoursdiff > 0.9 ) {
			$numbers = $hoursdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " ώρες";
			$ago_labelone = " ώρα";
		}
		if ( $daysdiff < 31 && $daysdiff > 0.9 ) {
			$numbers = $daysdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μέρες";
			$ago_labelone = " μέρα";
		}
		if ( $monthsdiff < 13 && $monthsdiff > 0.9 ) {
			$numbers = $monthsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μήνες";
			$ago_labelone = " μήνα";
		}
		if ( $yearsdiff > 0.9 ) {
			$numbers = $yearsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " χρόνια";
			$ago_labelone = " χρόνο";
		}
		if ( $final >= 1 ) {
			echo '<div class="imgcomment"><div class="sender"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"<img src="avatars/';
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
			echo ".</span" . '<span class="message"><strong id="' . $comment[ 'comment_id' ] . '">' . $transform . '</strong></span><div style="clear:both"> </div></div><br />';
		}
	}
	else {
		if ( $secondsdiff < 61 ) {
			echo '<div class="imgcomment"><div class="sender"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"<img src="avatars/';
			if ( $results2[ 'user_avatar' ] != "" ) {
				echo $results2[ 'user_avatar' ]; 
			}
			else if ( $results2[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}
			echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' .$results2[ 'user_name' ] . ' έγραψε : </span><span class="beforetime">πρίν από ' . $secondsdiff ;
			if ( $secondsdiff == 1 ) {
				echo " δευτερόλεπτο";
			}
			else {
				echo " δευτερόλεπτα";
			}
			echo ".</span" . '<span class="message"><span id="' . $comment[ 'comment_id' ] . '">' . $transform . '</span></span><div style="clear:both"> </div></div><br />';
		}
		if ( $minutesdiff < 61 && $minutesdiff > 0.9  ) {
			$numbers = $minutesdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " λεπτά";
			$ago_labelone = " λεπτό";
		}
		if ( $hoursdiff < 25 && $hoursdiff > 0.9 ) {
			$numbers = $hoursdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " ώρες";
			$ago_labelone = " ώρα";
		}
		if ( $daysdiff < 31 && $daysdiff > 0.9 ) {
			$numbers = $daysdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μέρες";
			$ago_labelone = " μέρα";
		}
		if ( $monthsdiff < 13 && $monthsdiff > 0.9 ) {
			$numbers = $monthsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " μήνες";
			$ago_labelone = " μήνα";
		}
		if ( $yearsdiff > 0.9 ) {
			$numbers = $yearsdiff;
			$pos = strpos($numbers, '.');
			$final = substr($numbers, 0, $pos);	
			$ago_label = " χρόνια";
			$ago_labelone = " χρόνο";
		}
		if ( $final >= 1 ) {
			echo '<div class="imgcomment"><div class="sender"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $comment[ 'comment_userid' ] . '"<img src="avatars/';
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
			echo ".</span" . '<span class="message"><span id="' . $comment[ 'comment_id' ] . '">' . $transform . '</span></span><div style="clear:both"> </div></div><br />';
		}
	}
?>