<?php
	$getnewpm = mysql_query("SELECT * FROM news WHERE new_type='pm' AND new_itemid=$user");
	while ( $newpm = mysql_fetch_array($getnewpm)) {
		$i = $i + 1;
	}
	echo '<div class="image_bar"><img src="avatars/';
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
		<a href="http://themis.kamibu.com/?p=messages" class="link_bar">
<?php
	if ( $i == 0 ) {
		echo '<span id="pm">Μηνύματα</span>';
	}
	else {
		if ( $i != 0 ) {
			if ( $i == 1 ) {
				echo '<span id="newpm">Έχεις ' . $i . ' νέο μήνυμα</span></a>';
			}
			else {
				if ( $i > 1 ) {
					echo '<span id="newpm">Έχεις ' . $i . ' νέα μηνύματα</span></a>';	
				}
			}
		}
	}	
?>
		<a href="?p=settings" class="link_bar">Ρυθμίσεις</a>
		<a href="?p=profile&user_id=<?php echo $myid; ?>" class="link_bar">Προφιλ</a>
		<a href="logout.php" class="link_bar">Έξοδος</a>
	</div>
	</div>
	<div class="myinfo_top">
		<span class="info_top">Όνομα : <?php echo $user_infos[ 'user_firstname' ]; ?></span>
		<span class="info_top">Επώνυμο : <?php echo $user_infos[ 'user_lastname' ]; ?></span>
		<span class="info_top">Ψευδώνυμο : <?php echo $user_infos[ 'user_name' ]; ?></span>
		<span class="info_top">E-mail : <?php echo $user_infos[ 'user_mail' ]; ?></span>
	</div>
		