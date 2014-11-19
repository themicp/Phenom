<?php 
    session_start();
    $user = $_SESSION[ 'id' ];
    include 'database.php';
    $getnews = mysql_query(" SELECT 
                                new_id ,
                                new_fromuser ,
                                new_itemid ,
								new_comment ,
								new_type
                             FROM news
                            ");
    while ( $results = mysql_fetch_array($getnews)) {
        $id = $results[ 'new_fromuser' ];
		if ( $results[ 'new_type' ] == "image" ) {
			$imageid = $results[ 'new_itemid' ];
			$gettouser = mysql_query("SELECT
										image_userid
									FROM images
									WHERE
										image_id=$imageid
									");
			$touser = mysql_fetch_array($gettouser);
		}
		$getuser = mysql_query(" SELECT
									user_id , 
									user_name , 
									user_avatar
								FROM 
									users
								WHERE 
									user_id=$id
								");
		$results1 = mysql_fetch_array($getuser);
		if ( $results[ 'new_id' ] != "" ) {
			if ( $results[ 'new_type' ] == "profile" && $user == $results[ 'new_itemid' ] ) {
				echo '<div class="newcomm"><a href="?p=profile&user_id=' . $user . '&comment_id=' . $results[ 'new_comment' ] . '#' . $results[ 'new_comment' ] . '">' . '<img src="avatars/';
				if ( $results1[ 'user_avatar' ] != "" ) {
					echo $results1[ 'user_avatar' ]; 
				}
				else if ( $results1[ 'user_avatar' ] == "" ) {
					echo 'noimage.jpg';
				} 
				echo '" alt="' . $results1['user_name'] . '" class="newimg" /></a>' . '<div  class="newtxt">Πρόσθεσε ένα σχόλιο στο προφιλ σου.</div><div style="clear:left"></div></div><br />';
			}
			if ( $results[ 'new_type' ] == "image" && $user == $touser[ 'image_userid' ]  ) {
				echo '<div class="newcomm"><a href="?p=gallery&id=' . $results[ 'new_itemid' ] . '&comment_id=' . $results[ 'new_comment' ] . '#' . $results[ 'new_comment' ] . '">' . '<img src="avatars/';
				if ( $results1[ 'user_avatar' ] != "" ) {
					echo $results1[ 'user_avatar' ]; 
				}
				else if ( $results1[ 'user_avatar' ] == "" ) {
					echo 'noimage.jpg';
				} 
				echo '" alt="' . $results1['user_name'] . '" class="newimg" /></a>' . '<div  class="newtxt">Πρόσθεσε ένα σχόλιο σε μία από τις εικόνες σου.</div><div style="clear:left"></div></div><br />';
			}
		}
    }
    while ( $new_request = mysql_fetch_array($get_new_request) ) {
        if ( $new_request != "" ) {
            $request_id = $new_request[ 'friendship_fromuser' ];
            $get_user_request_inf = mysql_query("SELECT * FROM users WHERE user_id=$request_id");
            $user_request_inf = mysql_fetch_array($get_user_request_inf);
            echo '<div class="newcomm"><a href="?p=profile&user_id=' . $user_request_inf[ 'user_id' ] . '"><img src="avatars/';
            if ( $user_request_inf[ 'user_avatar' ] == "" ) {
                echo "noimage.jpg";
            }
            else {
                echo $user_request_inf[ 'user_avatar' ];
            }
            echo '" alt="' . $user_request_inf[ 'user_name' ] . '" class="newimg" /></a><div class="newtxt">Επιθυμεί να γίνει φίλος σου.</div><div class="accet_decline"><a href="?p=home&accept=' . $user_request_inf[ 'user_id' ] . '">Αποδοχή</a> | <a href="?p=home&decline=' . $user_request_inf[ 'user_id' ] . '">Απόρριψη</a></div><div style="clear:left"></div></div><br />';
        }
    }
                                                                                                                    
?>
