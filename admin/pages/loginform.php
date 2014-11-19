<?php 
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
        <title>
            ACP | Login
        </title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
           	    	<div id="main">
			<span id="loginfo">You need to be logged in to access to the administrator control panel.</span>
			<div id="loginform">
            				<img src="../images/padlock.png" alt="padlock" id="padlock" />
            				<form action="login.php" enctype="multipart/form-data" method="post" >
                					<div id="userinput"><span id="userhdr">Username</span><input type="text" class="userinput" name="username" /></div>
               				 	<div id="passinput"><span id="passhdr">Password</span><input type="password" class="passinput" name="password" /></div>
					<input type="submit" value="Login" id="loginbt" />
            				</form>
			</div>
        		</div>
	</body>
</html>
