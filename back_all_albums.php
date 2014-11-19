<?php
    include 'database.php';
	$albumid = $_GET[ 'id' ];
	$get_owner = mysql_query("SELECT album_owner FROM albums WHERE album_id=$albumid");
	$owner = mysql_fetch_array($get_owner);
?>
    <a href="?p=albums&id=<?php echo $owner[ 'album_owner' ]; ?>"><img src="images/go_back.png" alt="go_back" class="img_goback" /><span class="span_goback">Όλα τα albums</span></a>
