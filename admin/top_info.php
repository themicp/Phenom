<?php
	echo '<div class="image_bar"><img src="../avatars/';
	if ( $user_infos[ 'user_avatar' ] != "" ) {
		echo $user_infos[ 'user_avatar' ]; 
	}
	else if ( $user_infos[ 'user_avatar' ] == "" ) {
		echo 'noimage.jpg';
	}
	echo '" alt="' . $user_infos[ 'user_name' ] . '" class="my_avatar" />'; ?> 
	<div id="searchfile">
		<form action="?p=search" method="post" enctype="multipart/form-data" >
				<input type="text" id="searchtxt" name="searchtxt" />
				<input type="submit" value="" id="searchbtn" />
		</form>
	</div>
	<div class="links_top">
		<a href="logout.php" class="link_bar">Έξοδος</a>
	</div>
	</div>
	<div class="myinfo_top">
		<span class="info_top">Όνομα : <?php echo $user_infos[ 'user_firstname' ]; ?></span>
		<span class="info_top">Επώνυμο : <?php echo $user_infos[ 'user_lastname' ]; ?></span>
		<span class="info_top">Ψευδώνυμο : <?php echo $user_infos[ 'user_name' ]; ?></span>
		<span class="info_top">E-mail : <?php echo $user_infos[ 'user_mail' ]; ?></span>
		<span class="info_top">Τελευταία σύνδεση από : <?php echo $_SESSION[ 'last_login' ]; ?></span>
	</div>
		