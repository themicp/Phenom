<?php 
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	include 'resetsend.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el">
	<head>
		<title>
			Είσοδος | Phenom
		</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" /> 
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv="Content-Language" content="el">   
	</head>
	<body>
		<a href="index.php"><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a>
		<div id="content">
            <div id="resetform">
				<?php if ( $sended == true ) { echo '<div id="sended">Τα στοιχεία του λογαριασμού σου στάλθηκαν στο e-mail σου.</div>'; } else { if ( $mailinput == false ) { echo '<div id="entermail">Παρακαλώ εισάγετε το mail του λογαριασμού παρακάτω :' ?> 
                <form action="reset.php" method="post" enctype="multipart/form-data">
                    <div id="username"><input type="text" name="res_mail" id="mailreset" /></div>
                    <input type="submit" value="Αποστολή" class="resetbtn" />
				</form>	
				<?php ; } } if ( $mailexist == false ) { echo '<div class="mail_false">Δεν υπάρχει λογαριασμός με αυτό το e-mail.</div>' ?>
	                <form action="reset.php" method="post" enctype="multipart/form-data">
						<div id="username"><input type="text" name="res_mail" id="mailreset" /></div>
						<input type="submit" value="Αποστολή" class="resetbtn" />
					</form>	
				<?php ; } ?>
            </div>
            </div>
		</div>
	</body>
</html>



