<?php
	session_start();
	$user = $_SESSION[ 'id' ];
	include 'database.php';
	$result = mysql_query("SELECT user_id, user_firstname, user_password, user_lastname , user_msn , user_skype , user_page , user_gmail , user_age , user_about , user_twitter FROM users WHERE user_id='$user'");
	while ($row = mysql_fetch_array($result)) {
?>
<form action="savesettings.php" method="post" enctype="multipart/form-data" >
	<div class="opt"><span class="changeavatar">Φωτογραφία : </span>
	<input type="file" name="file" id="avatarslct" value="Browse..."/></div>
	<div class="opt"><span class="changeopt">Όνομα : </span>
	<input type="text" name="firstname" value="<?php echo $row[ 'user_firstname' ]; ?>" class="inputopt" /></div>
	<div class="opt"><span class="changeopt">Επίθετο : </span>
	<input type="text" name="lastname" value="<?php echo $row[ 'user_lastname' ]; ?>" class="inputopt" /></div>
	<div class="opt"><span class="changeopt">Κωδικός : </span>
	<input type="password" name="password" value="<?php echo $row[ 'user_password' ]; ?>" class="inputopt" /></div>	
	<div class="opt"><span class="changeopt">Ηλικία : </span>
	<input type="text" name="age" value="<?php echo $row[ 'user_age' ]; ?>"  class="inputopt"/></div>
	<div class="opt"><span class="changeopt">MSN : </span>
	<input type="text" name="msn" value="<?php echo $row[ 'user_msn' ]; ?>"class="inputopt"  /></div>
	<div class="opt"><span class="changeopt">Skype : </span>
	<input type="text" name="skype" value="<?php echo $row[ 'user_skype' ]; ?>"class="inputopt"  /></div>
	<div class="opt"><span class="changeopt">Twitter : </span>
	<input type="text" name="twitter" value="<?php echo $row[ 'user_twitter' ]; ?>"class="inputopt"  /></div>
	<div class="opt"><span class="changeopt">Gmail : </span>
	<input type="text" name="gmail" value="<?php echo $row[ 'user_gmail' ]; ?>" class="inputopt" /></div>
	<div class="opt"><span class="changeopt">Ιστοσελίδα : </span>
	<span class="http">http://</span>
	<input type="text" name="page" class="inputopt" value="<?php echo $row[ 'user_page' ]; ?>" /></div>
	<div class="opt"><span class="changeopt">Λίγα λόγια για εμένα : </span>
	<textarea name="about" class="inputabout" ><?php echo $row[ 'user_about' ]; ?></textarea></div>
	<input type="submit" value="Save" id="savesetts" />
</form>
<?php 
	}
?>