<?php	
	function online_list() {	
		include 'database.php';
		$getonline = mysql_query("SELECT online_userid, online_time, user_id, user_avatar, user_name FROM online, users WHERE user_id=online_userid AND online_time >= NOW() - INTERVAL 5 MINUTE");	
		$online_data = array();
		while ( $online = mysql_fetch_array($getonline)) {
			$online_data[] = $online;
		}
		return $online_data;
	}
?>