<?php
    include 'setonline.php';
	include 'database.php';
	session_start();
	$myid = $_SESSION[ 'id' ];
	echo '<?xml version="1.0" encoding="utf-8"?>';
	$get_user_infos = mysql_query("SELECT user_avatar, user_name , user_firstname, user_lastname, user_mail , user_avatar FROM users WHERE user_id=$myid");
	$user_infos = mysql_fetch_array($get_user_infos);
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div id="search_div_results">
				<?php include 'searchfile.php'; ?><div style="clear:both"></div>		
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



