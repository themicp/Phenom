<?php
	while ( $images = mysql_fetch_array($get_images)) {
?>
<a href="?p=gallery&id=<?php echo $images[ 'image_id' ]; ?>"><img src="avatars/<?php echo $images[ 'image_location' ]; ?>" alt="<?php echo $owner_info[ 'user_name' ]; ?>" class="album_image" /></a>
<?php
	$images_exist = true;
}
if ( $images_exist == false ) {
	echo '<span class="empty_album">Δεν υπάρχουν εικόνες σε αυτό το album.</span>';
}
?>