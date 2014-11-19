<?php
	include 'models/online.php';
	$users = online_list();
	foreach ( $users as $value ) {
		echo '<div class="onlineimg"><a href="?p=profile&amp;user_id=' . $value[ 'user_id' ] . '"><div class="onlineimg"><img src="avatars/';
		if ( $value[ 'user_avatar' ] != "" ) {
			echo $value[ 'user_avatar' ]; 
		}
		else {
			echo 'noimage.jpg';
		}	
		echo '" alt="' . $value[ 'user_name' ] . '" title="' . $value[ 'user_name' ] . '" class="onlineusr" /></div></a></div>';
	}
?>

