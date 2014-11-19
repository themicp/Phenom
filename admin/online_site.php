<?php
    include 'database.php';
    $getonline = mysql_query("SELECT * FROM online");
    while ( $online = mysql_fetch_array($getonline)) {
        $usrtimestamp = $online[ 'online_time' ];
        $usrtime = $usrtimestamp / 60;
        $getdate = getdate();
        $onlineid = $online[ 'online_userid' ];
        $timestampnow = $getdate[ 0 ] / 60;
        $minutesdiff = $timestampnow - $usrtime;
        if ( $minutesdiff > 5 ) {
            $deluser = mysql_query("DELETE FROM online WHERE online_time='$usrtimestamp' LIMIT 1");
        }
        else {
            $getuser = mysql_query("SELECT user_name, user_avatar, user_id FROM users WHERE user_id=$onlineid");
            $user = mysql_fetch_array($getuser);
            echo '<div class="onlineimga"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $user[ 'user_id' ] . '"><div class="onlineimga"><img src="../avatars/';
			if ( $user[ 'user_avatar' ] != "" ) {
				echo $user[ 'user_avatar' ]; 
			}
			else if ( $user[ 'user_avatar' ] == "" ) {
				echo 'noimage.jpg';
			}	
			echo '" alt="' . $user[ 'user_name' ] . '" title="' . $user[ 'user_name' ] . '" class="onlineusra" /></div></a></div>';
        }
    }
?>
<div style="clear:both"></div>
