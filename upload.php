<?php 
	session_start();
	if ( $_SESSION[ 'id' ] != "" ) {
		include 'pages/upload.php';
	}
	else
	{
		include 'pages/loginform.php';
	}
?>