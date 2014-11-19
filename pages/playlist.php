<?php 
	header( "Content-type: text/html; charset=utf-8" );
	include 'playlistheader.php';
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
			<div class="play_div">
				<object type="application/x-shockwave-flash" data="music/player_mp3_maxi.swf" width="400" height="20">
					<param name="movie" value="music/player_mp3_maxi.swf" />
					<param name="bgcolor" value="#f5ffff" />
					<param name="FlashVars" value="mp3=http%3A//themis.kamibu.com/music/<?php echo $song; ?>&amp;width=400&amp;autoplay=1&amp;showstop=1&amp;showinfo=1&amp;showvolume=1&amp;showloading=always&amp;loadingcolor=f50000&amp;bgcolor=f5ffff&amp;bgcolor1=87CEEB" />
				</object>
			</div>
			<div class="playlist">
				<?php include 'show_playlist.php'; ?>
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