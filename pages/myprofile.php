<?php 
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
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
		<div id="top">
			<?php include './logged.php'; ?>
		</div>
		<div id="navigation">
			<?php include './navmenu.php'; ?>
		</div>
		<div id="content">
			<div id="place">
				<span>
					You are viewing: 
				</span>
				<p class="place">Phenom &#62;&#62; My Profile</p>
			</div>
			<div id="avatar">
				<?php include 'avatar.php'; ?>
			</div>
			<div id="aboutme">
				<h1 id="abouthdr">Some words about me:</h1>
				<textarea id="aboutmetxt" readonly="yes" ><?php include 'aboutme.php'; ?></textarea>
			</div>
			<div id="userinfo">
				<?php include 'userinfo.php'; ?>
			</div>
			<div id="comments">
				<h1 id="commshdr">Comments : </h1>
				<?php include 'comments.php'; ?>
				<?php include 'pages/commform.php'; ?>
			</div>
		</div>
	</body>
</html>



