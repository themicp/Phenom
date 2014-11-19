<?php 
	session_start();
	if ( $_SESSION[ 'id' ] != "" ) {
		include 'pages/settings.php';
	}
	else
	{
		include 'pages/loginform.php';
	}
?>