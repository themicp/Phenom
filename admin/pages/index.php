<?php 
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	include 'indexheader.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
        <title>
            ACP | Phenom
        </title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="link_home"><a href="?p=home" ><img src="../bg/logo_acp.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div id="right">
				<div class="onlinediva">
					<div class="online_img_labela">
						<img src="../bg/online.gif" class="online_icona" alt="online_phenom"/>
						<span class="online_labela">Συνδεδεμένοι στο Phenom</span>
					</div>
					<div class="show_online_nowa"><?php include 'online_site.php'; ?></div>
					<div style="clear:both"></div>
				</div>
				<div id="note_main">
					<div id="note_img_label">
						<img src="../bg/notes.gif" id="note_icon" alt="notes" />
						<span id="note_label">Σημειώσεις</span>
					</div>
					<div id="show_note">
						<form action="" enctype="multipart/form-data" method="post">
							<textarea id="text_note" name="note"><?php include 'notes.php'; ?></textarea>
							<input type="submit" value="Αποθήκευση" id="savenote_btn" />
						</form>
					</div>
				</div>
			</div>
			<div class="nav_bar">
				<div class="navbar_opt_div"><a href="?p=messages"><span class="navbar_opt"><img src="../bg/messages.gif" alt="messages" class="img_nav_opt" /><span class="navbar_label">Μηνύματα</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=albums&id=<?php echo $myid; ?>"><span class="navbar_opt"><img src="../bg/images.gif" alt="images" class="img_nav_opt" /><span class="navbar_label">Φωτογραφίες</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=friends"><span class="navbar_opt"><img src="../bg/friends.gif" alt="friends" class="img_nav_opt" /><span class="navbar_label">Φίλοι</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=profile&user_id=<?php echo $myid; ?>"><span class="navbar_opt"><img src="../bg/profile.gif" alt="profile" class="img_nav_opt" /><span class="navbar_label">Προφιλ</span></span></a></div>
				<div class="navbar_opt_div"><a href="?p=playlist"><span class="navbar_opt"><img src="../bg/music.gif" alt="music" class="img_nav_opt" /><span class="navbar_label">Μουσική</span></span></a></div>
			</div>
            <div class="onlinediv">
				<div class="online_img_label">
					<img src="../bg/online.gif" class="online_icon" alt="online"/>
					<span class="online_label">Συνδεδεμένοι στο ACP</span>
				</div>
				<div class="show_online_now"><?php include 'online.php'; ?></div>
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
<?php include '../html_footer.php'; ?>
