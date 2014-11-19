<?php 
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
        <title>
            ACP | Phenom
        </title>
		<link href="css/home.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="top">
			<?php include 'logged.php'; ?><a href="logout.php"><span class="top">Logout</span></a>
		</div>
		<div id="navmenu">
			<?php include 'navmenu.php' ?>
		</div>
		<div id="main">
			<div id="edit">
				<?php include 'pages/edit.php' ?>
			</div>
		</div>
	</body>
</html>