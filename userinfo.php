<?php
	include 'database.php';
	$userid = $_GET[ 'user_id' ];
	$user = $_SESSION[ 'id' ];
	$info = mysql_query( "SELECT user_id, user_name, user_firstname , user_lastname, user_msn , user_gmail , user_skype , user_page, user_age, user_about, user_twitter  FROM users WHERE user_id='$userid'" );
	$userinfos = mysql_fetch_array( $info ); 
	$transform1 = htmlspecialchars( $comment[ 'comment_text' ] , ENT_QUOTES);
	$check_friendship_exists1 = mysql_query("SELECT friendship_id, friendship_accepted FROM friendships WHERE friendship_touser=$userid AND friendship_fromuser=$user OR friendship_touser=$user AND friendship_fromuser=$userid");
	$check_results1 = mysql_fetch_array($check_friendship_exists1);
	$fields = array($userinfos[ 'user_twitter' ] => 'Twitter : ',
					$userinfos[ 'user_firstname' ] => 'Όνομα : ' , 
					$userinfos[ 'user_lastname' ] => 'Επώνυμο: ' , 
					$userinfos[ 'user_age' ] => 'Ηλικία : ' , 
					$userinfos[ 'user_msn' ] => 'MSN : ' ,
					$userinfos[ 'user_skype' ] => 'Skype : ' ,
					$userinfos[ 'user_gmail' ] => 'Gmail : ' ,
					$userinfos[ 'user_about' ] => 'Σχετικά με εμένα : ' ,
					$userinfos[ 'user_page' ] => 'Ιστοσελίδα : '
					  );
	foreach ( $fields as $fieldname => $label ) {
		$transform1 = htmlspecialchars( $fieldname , ENT_QUOTES);
		if ( $fieldname != "" && $label != "Ιστοσελίδα : " && $label != "Twitter : ") {
			echo '<span class="user_info_span">' . $label . '<strong>' . $transform1 . '</strong></span><br />';
		}
		if ( $label == "Ιστοσελίδα : " && $fieldname != "" ) {
			echo '<span class="user_info_span">' . $label . '<a href="http://' . $transform1 . '">Επισκέψου με!</a></span>';
		}
		if ( $label == "Twitter : " && $fieldname != "" ) {
			echo '<div class="user_info_span"><a href="http://www.twitter.com/' . $transform1 . '"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-a.png" alt="Follow ' . $transform1 . ' on Twitter" class="follow_me" /></a></div>';
		}
	}
?>
<a href="?p=playlist&user_id=<?php echo $userinfos[ 'user_id' ]; ?>"><div class="user_playlist"><span class="user_playlist_label">Μουσική</span></div></a>
<?php if ( $user != $userid ) { ?><a href="http://themis.kamibu.com/?p=messages&act=new&ref=<?php echo $userinfos[ 'user_name' ]; ?>"><div class="sent_ref"><span class="send_ref_txt">Στείλε μήνυμα.</span></div></a>
<?php if ( $check_results1 == "" ) { ?>
	<div class="add_friend">
		<form action="" method="post" enctype="multipart/form-data" />
			<input type="hidden" value="<?php echo $userinfos[ 'user_id' ]; ?>" name="add" />
			<input type="submit" value="Προσθήκη στους φίλους" class="add_friend_btn" />
		</form>
	</div>
<?php } if ( $check_results1[ 'friendship_accepted' ] == "waiting" ) { echo '<div class="waiting_"><span class="">Αναμονή για αποδοχή</span></div>'; } ?>
<?php } ?>
