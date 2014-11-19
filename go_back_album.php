<?php
    include 'database.php';
    $get_album_id = mysql_query("SELECT image_album FROM images WHERE image_id=$imageid");
    $album_id = mysql_fetch_array($get_album_id);
	$get_album_info = mysql_query("SELECT * FROM albums WHERE album_id=" . $album_id[ 'image_album' ]);
	$album_info = mysql_fetch_array($get_album_info);
?>
    <a href="?p=album&id=<?php echo $album_id[ 'image_album' ]; ?>"><img src="images/go_back.png" alt="go_back" class="img_goback" /><span class="span_goback">Πίσω στο album "<?php echo $album_info[ 'album_name' ]; ?>"</span></a>
