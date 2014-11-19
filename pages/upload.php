<?php
    session_start();
    include 'setonline.php';
	header( "Content-type: text/html; charset=utf-8" );
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
		<title>
			<?php include './title.php'; ?>
		</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" /> 
	</head>
	<body>
		<a href="index.php"><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a>
		<div id="content">
			<div id="lastuploads">		
				<?php include './filemanager/latest.php'; ?>
			</div>
			<?php
				session_start();
				include 'database.php';
				$loggedas = array( "themis1995" => "Themis Papameletiou",
							"dionyziz" => "Dionysis Zindros");
				$filenm = $_FILES[ "file" ][ "name" ];
				$blacklst = substr($filenm, -4);
				//$name = rand(1, 1000000000000000000) . $filenm;
				$perm = "uploads/" . $filenm;
				$temp  = $_FILES[ 'file' ][ 'tmp_name' ];
				$uploader = $_SESSION[ 'id' ];
				if ( $blacklst != ".php" && $blacklst != ".PHP" && $blacklst != ".PhP" && $blacklst != ".pHP" && $blacklst != ".PHp" && $blacklst != ".phP" && $blacklst != ".Php" && $blacklst != ".pHp" ) {
					if ( $filenm != "" ) {				
						move_uploaded_file( $temp, $perm );
						file_put_contents( "uploads/uploads.txt", "\r\n$filenm -> $uploader", FILE_APPEND );
						echo '<div id="success">File uploaded successfully to the server! <br /> Location : <strong>http://themis.kamibu.com/' . $perm . '</strong> <br />';
						$result = mysql_query("SELECT user_id, user_firstname, user_lastname FROM users WHERE user_id='$uploader' ");
						while ($row = mysql_fetch_array($result)) {
							echo 'Uploader : ' . "<strong>$row[1]" . " $row[2]</strong></div>" ;
						}
					}
					else
					{
						include 'uploadform.php';
					}
				}
				else
				{
				echo "<br />This file extension is blacklisted by the administrator.";
				}
			?>
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
