<?php
	session_start();
	$user_id = $_GET[ 'id' ];
	$myid = $_SESSION[ 'id' ];
	include 'database.php';
	$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
	$user_infos = mysql_fetch_array($get_user_infos);
	if ( $user_id != "" ) {
		$get_all_friends = mysql_query("SELECT * FROM friendships WHERE (friendship_fromuser=$user_id OR friendship_touser=$user_id) AND friendship_accepted='1'");
	}
	else if ( $user_id == "" ) {
		$get_all_friends = mysql_query("SELECT * FROM friendships WHERE (friendship_fromuser=$myid OR friendship_touser=$myid) AND friendship_accepted='1'");
	}
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div class="all_friends_div">
				<?php
					while ( $friends = mysql_fetch_array($get_all_friends) ) {
						if ( $user_id != "" ) {
							if ( $friends[ 'friendship_fromuser' ] == $user_id ) {
								$get_friend_infos = mysql_query("SELECT user_name, user_avatar, user_id FROM users WHERE user_id=" . $friends[ 'friendship_touser' ]);
								$friend_infos = mysql_fetch_array($get_friend_infos);
								echo '<div class="friend_div"><div class="container_friend"><img src="avatars/' . $friend_infos[ 'user_avatar' ] . '" alt="' . $friend_infos[ 'user_name' ] . '" class="friend_img"/><a href="?p=profile&user_id=' . $friend_infos[ 'user_id' ] . '">' . $friend_infos[ 'user_name' ] . '</a></div></div>';
							}
							if ( $friends[ 'friendship_touser' ] == $user_id ) { 
								$get_friend_infos = mysql_query("SELECT user_name, user_avatar, user_id FROM users WHERE user_id=" . $friends[ 'friendship_fromuser' ]);
								$friend_infos = mysql_fetch_array($get_friend_infos);
								echo '<div class="friend_div"><div class="container_friend"><img src="avatars/' . $friend_infos[ 'user_avatar' ] . '" alt="' . $friend_infos[ 'user_name' ] . '" class="friend_img"/><a href="?p=profile&user_id=' . $friend_infos[ 'user_id' ] . '">' . $friend_infos[ 'user_name' ] . '</a></div></div>';
							}
						}
						else if ( $user_id == "" ) {
							if ( $friends[ 'friendship_fromuser' ] == $myid ) {
								$get_friend_infos = mysql_query("SELECT user_name, user_avatar, user_id FROM users WHERE user_id=" . $friends[ 'friendship_touser' ]);
								$friend_infos = mysql_fetch_array($get_friend_infos);
								echo '<div class="friend_div"><div class="container_friend"><img src="avatars/' . $friend_infos[ 'user_avatar' ] . '" alt="' . $friend_infos[ 'user_name' ] . '" class="friend_img"/><a href="?p=profile&user_id=' . $friend_infos[ 'user_id' ] . '">' . $friend_infos[ 'user_name' ] . '</a></div></div>';
							}
							if ( $friends[ 'friendship_touser' ] == $myid ) {
								$get_friend_infos = mysql_query("SELECT user_name, user_avatar, user_id FROM users WHERE user_id=" . $friends[ 'friendship_fromuser' ]);
								$friend_infos = mysql_fetch_array($get_friend_infos);
								echo '<div class="friend_div"><div class="container_friend"><img src="avatars/' . $friend_infos[ 'user_avatar' ] . '" alt="' . $friend_infos[ 'user_name' ] . '" class="friend_img"/><a href="?p=profile&user_id=' . $friend_infos[ 'user_id' ] . '">' . $friend_infos[ 'user_name' ] . '</a></div></div>';								
							}
						}
					}		
				?>
			</div>
		</div>
		<div class="footer">
			<div class="links_footer">
				<a href="#"><span class="about_link">Πληροφορίες</span></a>
				<a href="#"><span class="advertise_link">Διαφήμιση</span></a>
			</div>
			<span class="copyright">Phenom &copy; 2010</span>
		</div>
<?php include 'html_footer.php'; ?>
