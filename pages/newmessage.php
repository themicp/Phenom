<?php 
	session_start();
	include 'messagesheader.php';
	include 'html_header.php';
?>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
			<div class="top">
				<?php include 'top_info.php'; ?>
			</div>
            <div id="navmessages">
                <div class="optinbox"><img src="images/messages.gif" alt="inbox" class="messageico" /><span id="inbox"><a href="?p=messages&act=inbox">Εισερχόμενα</a></span></div>
                <div class="optsent"><img src="images/messages.gif" alt="sent" class="messageico" /><span id="sent"><a href="?p=messages&act=sent">Απεσταλμένα</a></span></div>
                <div class="optnew"><img src="images/newmessage.gif" alt="new" class="messageico" /><span id="newmessage"><a href="?p=messages&act=new">Νέο μήνυμα</a></span></div>
            </div>
			<div id="newmessage">
				<?php include 'newpmform.php'; ?>
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



