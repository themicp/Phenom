<?php 
	header( "Content-type: text/html; charset=utf-8" );
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el">
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
		<div id="filescontent">
			<div id="place">
				<span>
					Είσαι εδώ: 
				</span>
				<div class="place">Phenom &#62;&#62; Αρχεία</div>
			</div>
			<div id="lastuploads">		
				<?php include './filemanager/latest.php'; ?>
			</div>
			<?php include './uploadedfiles.php'; ?>
		</div>
	</body>
</html>



