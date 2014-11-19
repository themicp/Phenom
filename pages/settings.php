<?php
    include 'setonline.php';
	session_start();
	include 'get_top_info.php';
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	include 'html_header.php';
?>
		<a href="?p=home"><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div id="changeavatar">
				<div class="myavatar"><?php include 'setsavatar.php'; ?></div>
				<div style="clear:both"> </div>
			</div>
			<div id="opts">
				<?php include 'settingsform.php'; ?>
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



