<?php
    include 'setonline.php';
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
		<title>
			<?php include './title.php'; ?>
		</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" /> 
	</head>
	<body>
		<div id="top">
			<?php include './logged.php'; ?>
		</div>
		<div id="navigation">
			<?php include './navmenu.php'; ?>
		</div>
		<div id="content" >
			<div id="place">
				<span>
					Είσαι εδώ: 
				</span>
				<p class="place">Phenom &#62;&#62; Μέλη</p>
			</div>
			<div id="members">
				<?php 
					include 'database.php';
					$userinfo = mysql_query("SELECT user_id, user_name, user_firstname , user_lastname, user_avatar FROM users");
					while ($users = mysql_fetch_array($userinfo)) { 
						if ( $users[ 'user_avatar' ] != "" ) {
							echo '<div class="member" ><a href="http://themis.kamibu.com/profile.php?user_id=' . $users[ 'user_id' ] . '"><div class="membavtr"><img src="' . $users[ 'user_avatar' ] . '" alt="avatar" class="memberavatar"/></div></a><span class="memberid">' . $users[ 'user_name' ] . '</span><span class="membername">' . $users[ 'user_firstname' ] . ' ' . $users[ 'user_lastname' ] . '</span></div>';
						}
						else
						{
							if ( $users[ 'user_avatar' ] == "" ) {
								echo '<div class="member" ><a href="http://themis.kamibu.com/profile.php?user_id=' . $users[ 'user_id' ] . '"><div class="membavtr"><img src="http://themis.kamibu.com/images/noimage.jpg" alt="avatar" class="memberavatar"/></div></a><span class="memberid">' . $users[ 'user_name' ] . '</span><span class="membername">' . $users[ 'user_firstname' ] . ' ' . $users[ 'user_lastname' ] . '</span></div>';
							}
						}
					}
				?>
			</div>	
			<div style="clear:both"></div>
		</div>
	</body>
</html>
