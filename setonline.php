<?php
    session_start();
    include 'database.php';
    $myid = $_SESSION[ 'id' ];
	$now = getdate();
	$timestampnow = $now[ 0 ];
	$getonline = mysql_query("SELECT * FROM online WHERE online_userid=$myid");
	$online = mysql_fetch_array($getonline);
	if ( $online == "" ) {
		$setonlinenow = mysql_query("INSERT INTO online ( online_id, online_userid, online_time ) VALUES ( NULL, $myid, NOW() )");
	}
	else { 
		if ( $online != "" ) {
			$updateonline = mysql_query("UPDATE online SET online_time=NOW() WHERE online_userid='$myid'");
		}
	}
?>
