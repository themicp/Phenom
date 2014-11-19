<?php		
	session_start();
	include 'database.php';
	$get_users_search = mysql_query("SELECT * FROM users");
	$searchfile = $_POST[ 'searchtxt' ];					
	while ( $users_search = mysql_fetch_array($get_users_search) ) {
		similar_text($searchfile , $users_search[ 'user_name' ], $p);
		if ( $p > 40 ) {
			echo '<div class="user_results"><div class="user_search"><img src="avatars/' . $users_search[ 'user_avatar' ] . '" alt="' . $users_search[ 'user_name' ] . '" class="image_user_search"/><a href="?p=profile&user_id=' . $users_search[ 'user_id' ] . '">' . $users_search[ 'user_name' ] . '</a></div></div>';
		}
	}
?>