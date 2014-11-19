<div id="newprofcomm">
	<form action="http://themis.kamibu.com/phenom/?p=profile&user_id=<?php echo $profile; ?>" method="post" encype="multipart/form-data" >
		<div class="postform"><div class="imgtxt"><img src="avatars/<?php include 'database.php'; 
						$myid = $_SESSION[ 'id' ]; 
						$getpostavtr = mysql_query("SELECT user_avatar , user_name FROM users WHERE user_id='$myid'"); 
						$results3 = mysql_fetch_array($getpostavtr); 
						if ( $results3[ 'user_avatar' ] != "" ) {
							echo $results3[ 'user_avatar' ]; 
						}
						else if ( $results3[ 'user_avatar' ] == "" ) {
							echo 'noimage.jpg';
						}
					?>" alt="<?php 
								echo $results3[ 'user_name' ];
							?>"
						class="postavatar" />
		<textarea name="message" id="commenttxt"></textarea></div>
		<div class="buttonsend"><input type="submit" value="Στείλε" id="sendcomm" /></div>
		<div style="clear:both"></div>
		</div>
	</form>
</div>