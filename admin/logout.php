<?php
	session_start();
	$_SESSION['administrator'] = "";
	header('Location: http://themis.kamibu.com/admin/index.php');
?>