<?php 
	include 'database.php';
	session_start();
	$myid = $_SESSION[ 'id' ];
	if ( $myid != "" ) {
		include 'setonline.php';
		include 'get_topinfos.php';
		$my_avatar = $user_infos[ 'user_avatar' ];
		$get_image_avatar = mysql_query("SELECT image_id FROM images WHERE image_location='$my_avatar'");
		$image_avatar = mysql_fetch_array($get_image_avatar);
		$twitter_info = mysql_query( "SELECT user_id, user_twitter FROM users WHERE user_id='$myid'" );
		$twitter_infos = mysql_fetch_array( $twitter_info ); 
		$twitter_username = $twitter_infos[ 'user_twitter' ];
	}
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<?php 
				if ( $twitter_username != "" ) { ?>
					<script src="http://widgets.twimg.com/j/2/widget.js"></script>
					<script>
					new TWTR.Widget({
					  version: 2,
					  type: 'profile',
					  rpp: 15,
					  interval: 3000,
					  width: 'auto',
					  height: 300,
					  theme: {
						shell: {
						  background: '#ffffff',
						  color: '#000000'
						},
						tweets: {
						  background: '#f0f0f0',
						  color: '#000000',
						  links: '#eb0707'
						}
					  },
					  features: {
						scrollbar: false,
						loop: false,
						live: false,
						hashtags: true,
						timestamp: true,
						avatars: true,
						behavior: 'all'
					  }
					}).render().setUser('<?php echo $twitter_username; ?>').start();
					</script>
			<span id="login"></span>
			<script type="text/javascript">
				twttr.anywhere(function (T) {
					T("#login").connectButton();
				});
			</script>
			<button type="button" class="sign_out_twitt" onclick="twttr.anywhere.signOut();">Sign out of Twitter</button>
			<div id="tbox"></div>
				<script type="text/javascript">

				twttr.anywhere(function (T) {

					T("#tbox").tweetBox({
						height: 100,
						width: 400,
						defaultContent: ""
					});

				});

				</script>
			<?php
				}
				else {
					echo '<div class="no_twitter">Πρέπει να γράψεις στις ρυθμίσεις το username σου στο twitter.</div>';
				}
			?>
		</div>
		<div class="footer">
			<div class="links_footer">
				<a href="#"><span class="about_link">Πληροφορίες</span></a>
				<a href="#"><span class="advertise_link">Διαφήμιση</span></a>
			</div>
			<span class="copyright">Phenom &copy; 2010</span>
		</div>
<?php 
	include 'html_footer.php';
?>