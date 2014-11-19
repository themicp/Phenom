<?php
	include 'database.php';
	$getlatestimages = mysql_query("SELECT 
										image_id, image_userid, image_location, user_name 
									FROM 
										images, users 
									WHERE 
										user_id=image_userid 
									ORDER BY 
										image_id DESC 
									LIMIT 40"
									);
	while ( $latestimg = mysql_fetch_array($getlatestimages) ) {
		echo '<div class="last_image_div"><a href="http://themis.kamibu.com/?p=gallery&amp;id=' . $latestimg[ 'image_id' ] . '" ><img src="avatars/' . $latestimg[ 'image_location' ] . '" alt="' . $latestimg[ 'user_name' ] . '" title="' . $latestimg[ 'user_name' ] . '" class="last_image" /></a></div>';
	}
?>