<?php
    $get_my_friends = mysql_query("SELECT * FROM friendships WHERE (friendship_touser=$profile OR friendship_fromuser=$profile) AND friendship_accepted='1'");
    $friends_exist = false;
    while ( $my_friends = mysql_fetch_array($get_my_friends) ) {
        if ( $my_friends[ 'friendship_touser' ] == $profile ) {
            $fromuserid = $my_friends[ 'friendship_fromuser' ];
            $get_from_user_inf = mysql_query("SELECT * FROM users WHERE user_id=$fromuserid");
            $from_user = mysql_fetch_array($get_from_user_inf);
            echo '<div class="my_friend_imgdiv"><a href="?p=profile&user_id=' . $from_user[ 'user_id' ] . '"><img src="avatars/' . $from_user[ 'user_avatar' ] . '" alt="' . $from_user[ 'user_name' ] . '" class="my_friend_img" /></a></div>';
            $friends_exist = true;
        }
        if ( $my_friends[ 'friendship_fromuser' ] == $profile ) {
            $touserid = $my_friends['friendship_touser' ];
            $get_to_user_inf = mysql_query("SELECT * FROM users WHERE user_id=$touserid");
            $to_user = mysql_fetch_array($get_to_user_inf);
            echo '<div class="my_friend_imgdiv"><a href="?p=profile&user_id=' . $to_user[ 'user_id' ] . '"><img src="avatars/';
            if ( $to_user[ 'user_avatar' ] != "" ) {
                echo $to_user[ 'user_avatar' ];
            }
            else if ( $to_user[ 'user_avatar' ] == "" ) {
                echo 'noimage.jpg'; 
            }
            echo '" alt="' . $to_user[ 'user_name' ] . '" class="my_friend_img" /></a></div>';
            $friends_exist = true;
        }
    }
?>
