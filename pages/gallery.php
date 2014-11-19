<?php 
	include 'galleryheader.php';
	session_start();
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div class="uploader">
				<div class="uploader_info_div">
					<img src="avatars/<?php if ( $uploaderinfo[ 'user_avatar' ] != "" ) { 
										echo $uploaderinfo[ 'user_avatar' ]; 
									} 
									else if ( $uploaderinfo[ 'user_avatar' ] == "" ) { 
										echo 'noimage.jpg'; 
									} 
									?>" alt="<?php echo $uploaderinfo[ 'user_name' ]; ?>" class="uploader_img" />
					<a href="?p=profile&user_id=<?php echo $uploaderinfo[ 'user_id' ]; ?>"><span class="uploader_name"><?php echo $uploaderinfo[ 'user_name' ]; ?></span></a>
				</div>
			</div>
            <div class="back_album">
                <?php include 'go_back_album.php'; ?>
            </div>
			<div class="images">
			 <?php
					while ( $images = mysql_fetch_array($getimages) ) {
							echo '<div class="images_bar"><a href="?p=gallery&id=' . $images[ 'image_id' ] . '"><img src="avatars/' . $images['image_location'] . '" alt="' . $images[ 'image_userid' ] . '" class="myimages" /></a></div>';
					}
			 ?>
			</div>
			<div class="opened">
				<?php include 'showimages.php'; ?>
			</div>
			<div id="imgcomments">
				<?php 
					include 'pages/imgcommform.php';
					include 'imgcomments.php';  
				?>
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



