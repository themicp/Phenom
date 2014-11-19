<?php 
	include 'profileheader.php';
	session_start();
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
            <div class="announce">
                <?php
                    if ( $added == true ) {
                        echo '<div class="friend_added_div"><span class="friend_added">Η αίτηση για φιλία στάλθηκε στον χρήστη.</span></div>';
                    }
                    if ( $friendship_exists == true ) {
                        echo '<div class="friendship_exists_div"><span class="friendship_exists">Είσαι ήδη φίλος με τον συγκεκριμένο χρήστη.</span></div>';
                    }
                ?>
            </div>
			<div id="avatar">
				<?php include 'avatar.php'; ?>
			</div>
            <div class="my_friends">
                <div><span class="my_friends_hdr">Φίλοι</span>
                <span class="show_all_friends"><a href="?p=friends<?php if ( $userprof != $userid ) { echo '&id=' . $userprof; }?>">προβολή όλων</a></span></div>
                <?php include 'showfriends.php'; if ( $friends_exist == false ) { echo '<span class="no_friends">Δεν υπάρχουν φιλίες με αυτόν τον χρήστη</span>'; }?>
                <div style="clear:both"></div>
            </div>
			<div id="userinfo">
				<?php include 'userinfo.php'; ?>
			</div>
			<div id="comments">
				<span id="commshdr">Σχόλια</span>
				<?php include 'pages/commform.php'; ?>
				<?php include 'comments.php'; ?>
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


