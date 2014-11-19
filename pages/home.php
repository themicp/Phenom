<?php 
	session_start();
    include 'homeheader.php';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
				<?php include 'news.php'; ?>
			</div>
			<div class="nav_bar">
				<div class="navbar_opt_div"><a href="?p=messages"><span class="navbar_opt"><img src="bg/messages.gif" alt="messages" class="img_nav_opt" /><span class="navbar_label">Μηνύματα</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=albums&id=<?php echo $myid; ?>"><span class="navbar_opt"><img src="bg/images.gif" alt="images" class="img_nav_opt" /><span class="navbar_label">Φωτογραφίες</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=friends"><span class="navbar_opt"><img src="bg/friends.gif" alt="friends" class="img_nav_opt" /><span class="navbar_label">Φίλοι</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=profile&user_id=<?php echo $myid; ?>"><span class="navbar_opt"><img src="bg/profile.gif" alt="profile" class="img_nav_opt" /><span class="navbar_label">Προφιλ</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=playlist"><span class="navbar_opt"><img src="bg/music.gif" alt="music" class="img_nav_opt" /><span class="navbar_label">Μουσική</span></span></a></div>
			</div>
            <div class="onlinediv">
				<div class="online_img_label">
					<img src="bg/online.gif" class="online_icon" alt="online"/>
					<span class="online_label">Συνδεδεμένοι</span>
				</div>
				<div class="show_online_now"><?php include 'online.php'; ?></div>
				<div style="clear:both"></div>
            </div>
			<div class="right">
				<div id="lastimages">
				<?php include 'latestimages.php'; ?>
				</div>
				<div id="chat">
					<?php include 'chatform.php'; ?>
					<div id="chatmessages"><?php include 'chat.php'; ?></div>
				</div>
				<div id="lastposts">
					<?php include 'latestposts.php'; ?>
				</div>
				<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="footer">
			<div class="links_footer">
				<a href="#"><span class="about_link">Πληροφορίες</span></a>
				<a href="#"><span class="advertise_link">Διαφήμιση</span></a>
			</div>
			<span class="copyright">Phenom &copy; 2010</span>
		</div>
<?php include 'html_footer.php'; ?>



