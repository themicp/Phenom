<?php
	if ( $friend != "" ) {
		$get_newfriend = mysql_query("SELECT * FROM users WHERE user_id=$friend");
		$newfriend = mysql_fetch_array($get_newfriend);
		$check_friendship_exists = mysql_query("SELECT friendship_id FROM friendships WHERE friendship_touser='$friend' AND friendship_fromuser='$userid' OR ( friendship_touser=$userid AND friendship_fromuser=$friend)");
		$check_results = mysql_fetch_array($check_friendship_exists);
		if ( $newfriend != "" && $check_results == "" ) {
			$add_new_friend = mysql_query("INSERT INTO friendships ( friendship_id, friendship_touser, friendship_fromuser, friendship_accepted ) VALUES ( NULL, $friend, $userid, 'waiting')");
			$added = true;
		}
		if ( $check_results != "" ) {
			$friendship_exists = true;
		}
	}
?>