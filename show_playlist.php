<?php
	$playlist_exists = false;
	$i = 0;
	if ( $myid != "" ) {
		if ( $user_id == "" ) {
			$get_playlist_info = mysql_query("SELECT playlist_id, playlist_userid, playlist_song FROM `playlists` WHERE playlist_userid=$myid");
		}
		else if ( $user_id != "" ) {
			$get_playlist_info = mysql_query("SELECT playlist_id, playlist_userid, playlist_song FROM `playlists` WHERE playlist_userid=$user_id");
		}
		while ( $playlist_infos = mysql_fetch_array($get_playlist_info) ) {
			if ( $playlist_infos == true ) {
				$i = $i+1;
				$playlist_exists = true;
				echo '<div class="show_song_div"><div class="song_div">';
                if ( $myid == $user_id || $user_id == "" ) {
                    echo '<img src="images/del_icon.gif" alt="delete" id="a' . $playlist_infos[ 'playlist_id' ] . '" class="del_icon"/>';
					echo '<img src="images/del_ico_confirm.gif" alt="delete" id="c' . $playlist_infos[ 'playlist_id' ] . '" class="del_ico_confirm"/>';
                }
                echo $i . '.';
?>
<a href="?p=playlist<?php if ( $user_id != "" ) { echo '&user_id=' . $user_id; }?>&song=<?php echo $playlist_infos[ 'playlist_song' ]; ?>"><?php echo $playlist_infos[ 'playlist_song' ]; ?></a>
<?php if ( $myid == $userid || $userid == "" ) { ?>
<form action="" method="post">
	<input type="hidden" value="<?php echo $playlist_infos[ 'playlist_id' ]; ?>" name="delete_song_id" />
	<input type="submit" value="" class="del_song_input" id="b<?php echo $playlist_infos[ 'playlist_id' ]; ?>"/>
</form>
<div style="clear:both">
<?php } ?>
</div></div></div>
<script type="text/javascript">
document.getElementById( 'a<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).onclick = function () {
	document.getElementById( 'b<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="block";
	document.getElementById( 'a<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="none";
	document.getElementById( 'c<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="block";
};
</script>
<script type="text/javascript">
document.getElementById( 'c<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).onclick = function () {
	document.getElementById( 'b<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="none";
	document.getElementById( 'a<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="block";
	document.getElementById( 'c<?php echo $playlist_infos[ 'playlist_id' ]; ?>' ).style.display="none";
};
</script>
<?php
			}
		} 
?>
<?php
		if ( $playlist_exists == false && $user_id != "" && $user_id != $myid) {
			echo '<div class="no_playlist">Ο ' . $user_infos1[ 'user_name' ] . ' δεν έχει τραγούδια στο προφιλ του.';
		}
		else if ( $playlist_exists == false && $user_id == "" || $user_id == $myid ) {
			echo '<div class="no_playlist">Δεν έχεις τραγούδια στο προφίλ σου.</div>';
		}
		if ( $user_id == "" || $user_id == $myid ) {
?>
	<div class="song_upload_form">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="choose_song" class="song_input" value="Αναζήτηση" />
			<input type="submit" value="Ανέβασε" class="start_song_upl" />
		</form>
	</div>
<?php	
		}
	}
		
?>
