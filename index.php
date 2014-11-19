<?php 
	session_start();
    $page = $_GET[ 'p' ];
    $pages = array("home" => true, "messages" => true, "gallery" => true, "settings" => true, "profile" => true, "message" => true, "search" => true, "playlist" => true, "friends" => true, "album" => true, "albums" => true ); 
	if ( $_SESSION[ 'id' ] != "" ) {
		if ( isset( $pages[ $page ] ) ) {
            include 'pages/' . $page . '.php';
        }
        else {
            include 'pages/home.php';
        }
	}
	else
	{
		include 'pages/loginform.php';
	}
?>
