<?php
    if ( $imageid != "" ) {
		if ( $myid == $opened[ 'image_userid' ] ) {
			echo '<a href="?p=gallery&id=' . $imageid . '&set_default=' . $imageid . '"><span class="set_default_txt">Ορισμός προεπιλεγμένης</span></a><br />';
?>
	<div id="move_picture_div">
		<div id="move_picture_span">
			<span class="move_picture_txt">
				Μετακίνηση φωτογραφίας
			</span>
		</div>
		<div id="opts_move">
			<form action="" method="post" />
			<?php
				$get_all_albums = mysql_query("SELECT * FROM albums WHERE album_owner=$myid");
				while ( $all_albums = mysql_fetch_array($get_all_albums) ) { 
			?>
				<div class="option_move"><input type="radio" name="album" class="opt_albums" value="<?php echo $all_albums[ 'album_id' ]; ?>" /><?php echo $all_albums[ 'album_name' ] . '<br />'; ?></div>
			<?php } ?>
				<input type="submit" class="submit_move_pic" value="Μετακίνηση" />
			</form>
		</div>
		<script type="text/javascript">
		document.getElementById( 'move_picture_span' ).onclick = function () {
			document.getElementById( 'opts_move' ).style.display="block";
		};
		</script>
	</div>
<?php
		}
		$size = getimagesize('avatars/' . $opened[ 'image_location' ]); 
		$width = $size[ 0 ];
		$height = $size [ 1 ];
		if ( $width > 500 && $height > 500 ) {
			if ( $width > $height ) {
				$newwidth = $width * 500 / $width;
				$newheight = $height * 500 / $width;
			}
			else {
				$newheight = $height * 500 / $height;
				$newwidth = $width * 500 / $height;
			}
			$width = $newwidth;
			$height = $newheight;
		}
		if ( $width > 500 && $height < 500 ) {
			$newwidth = $width * 500 / $width;
			$newheight = $height * 500 / $width;
			$width = $newwidth;
			$height = $newheight;
		}
		if ( $height > 500 && $width < 500 ) {
			$newwidth = $width * 500 / $height;
			$newheight = $height * 500 / $height;
			$width = $newwidth;
			$height = $newheight;
		}		
		echo '<img src="avatars/' . $opened[ 'image_location' ] . '" alt="' . $opened[ 'image_userid' ] . '" width="' . $width . '" height="' . $height . '" class="openedimg" />';			
    }
?>