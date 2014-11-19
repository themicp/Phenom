<?php
	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];
	$mail = $_POST[ 'mail' ];
	$firstname = $_POST[ 'firstname' ];
	$lastname = $_POST[ 'lastname' ];
	$link = mysql_connect('localhost', 'themis', 'gamaoua55wiiihaaa');
	$error = false;
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("themis");

	$select = mysql_query("SELECT user_name, user_mail 
				FROM users ");
	$success = true;
	$query = sprintf("INSERT INTO `users` (
			`user_id` ,
			`user_name` ,
			`user_password` ,
			`user_mail` ,
			`user_firstname` ,
			`user_lastname`,
			`user_avatar`
			)
			VALUES (
			NULL , '$username', '$password', '$mail', '$firstname', '$lastname', 'http://themis.kamibu.com/images/noimage.jpg')"
			);
	if ( $username != "" && $password != "" && $mail != "" && $firstname != "" && $lastname != "" ) {	
		while ($row = mysql_fetch_array($select)) {	
			if ( $username == $row[ 'user_name' ] || $mail == $row[ 'user_mail' ] ) {
				$success = false;
				break;
			}
			else
			{
				$success = true;
			}
		}
		if ( $success == false) {
			$error = true;
		}
		else 
		{
			$result = mysql_query($query);
			header('Location: http://themis.kamibu.com/index.php');
		}
	}		
?>
<?php 
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el">
	<head>
		<title>
			Εγγραφή | Phenom
		</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" /> 
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv="Content-Language" content="el">   
	</head>
	<body>
		<div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
		<div id="content">
            <div id="registerform">
	<?php if ( $error == true ) { echo '<span id="error">This username or e-mail is registered on another account.</span>'; } ?>
                <form action="register.php" method="post" enctype="multipart/form-data">
                     <div id="username"><span id="regusercaption">Ψευδώνυμο  </span><?php if ( $username == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="username" id="usertext" value="<?php echo $username; ?>" /></div>
                    <div id="password"><span id="regpasscaption">Κωδικός  </span><?php if ( $password == "" ) { echo '<span class="missing">*</span>'; } ?><input type="password" name="password" id="passtext" value="<?php echo $password; ?>" /></div>
                    <div id="mail"><span id="regmailcaption">E-Mail  </span><?php if ( $mail == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="mail" id="mailtext" value="<?php echo $mail; ?>" /></div>
                    <div id="firstname"><span id="regfirstcaption">Όνομα  </span><?php if ( $firstname == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="firstname" id="firsttext" value="<?php echo $firstname; ?>" /></div>
                    <div id="lastname"><span id="reglast">Επίθετο  </span><?php if ( $lastname == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="lastname" id="lasttext" value="<?php echo $lastname; ?>" /></div>
	   <input type="submit" value="Register" class="registerbtn" />
	</form>
            </div>
		</div>
		<div class="footer">
			<div class="links_footer">
				<a href="#"><span class="about_link">Πληροφορίες</span></a>
				<a href="#"><span class="advertise_link">Διαφήμιση</span></a>
			</div>
			<span class="copyright">Phenom &copy; 2010</span>
		</div>
	</body>
</html>
