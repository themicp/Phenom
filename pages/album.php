<?php
    include 'albumheader.php';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div class="uploader">
				<div class="uploader_info_div">
					<img src="avatars/<?php if ( $owner_info[ 'user_avatar' ] != "" ) { 
										echo $owner_info[ 'user_avatar' ]; 
									} 
									else if ( $owner_info[ 'user_avatar' ] == "" ) { 
										echo 'noimage.jpg'; 
									} 
									?>" alt="<?php echo $owner_info[ 'user_name' ]; ?>" class="uploader_img" />
					<a href="?p=profile&user_id=<?php echo $owner_info[ 'user_id' ]; ?>"><span class="uploader_name"><?php echo $owner_info[ 'user_name' ]; ?></span></a>
				</div>
			</div>
			<div class="back_all_albums">
				<?php include 'back_all_albums.php'; ?>
			</div>
			<?php if ( $myid == $owner_info[ 'user_id' ] ) { ?>
			<div class="delete_album_main">
				<div id="delete_album">
					<img src="images/delete.png" alt="delete" class="img_delet_album" />
					<span class="del_album_txt">Διαγραφή του album</span>
				</div>
				<div id="del_check">
					<span class="del_check_txt">
						Είσαι σίγουρος/η;
					</span>
					<form action"" method="post" />
						<input type="submit" id="accept_del_album" value="Ναί" />
						<input type="hidden" value="<?php echo $albumid; ?>" name="delete_albumid"/>
					</form>
					<input type="submit" id="decline_del_album" value="Όχι" />
				</div>
				<script type="text/javascript">
				document.getElementById( 'delete_album' ).onclick = function () {
					document.getElementById( 'del_check' ).style.display="block";
				};
				</script>
				<script type="text/javascript">
				document.getElementById( 'decline_del_album' ).onclick = function () {
					document.getElementById( 'del_check' ).style.display="none";
				};
				</script>
			<?php } ?>
			<?php if ( $error_delete_album == true ) { ?> <span class="error_delete_album">Η διαγραφή είναι αδύνατη.</span><?php } ?>
			<div class="album_images">
				<?php include 'show_album_images.php'; ?>
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