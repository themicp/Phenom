<?php
	$filesave = $_POST[ 'savefile' ];
	$content = $_POST[ 'contentsave' ];
	file_put_contents( $filesave , $content);
	header('Location: http://themis.kamibu.com/admin/edit.php');
?>
