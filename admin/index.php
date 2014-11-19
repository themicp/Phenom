<?php
    session_start();
	include 'database.php';
    if ( $_SESSION['administrator'] != "" ) {
        include 'pages/index.php';
    }
    else
    {
        include 'pages/loginform.php';
    }
?>
