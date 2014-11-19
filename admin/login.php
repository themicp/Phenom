<?php
	session_start();
	$ip = getenv("REMOTE_ADDR");
	$time = date("D, d-m-Y, H:i:s");
	include 'database.php';
	$result = mysql_query("SELECT user_id , user_name , user_password , user_admin FROM users WHERE user_admin='1' ");
	$isp = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	while ($row = mysql_fetch_array($result)) {
		$username = $_POST[ 'username' ];
		$password = $_POST[ 'password' ];
		$loggedin = true;
		if ( $username == $row[ 'user_name' ] && $password == $row[ 'user_password' ] ) {
			header('Location: http://themis.kamibu.com/admin/index.php');
			$_SESSION[ 'administrator' ] = $row[ 'user_id' ];
			$get_old_isp = mysql_query("SELECT admin_last_login FROM users WHERE user_name='$username'");
			$row_old_isp = mysql_fetch_array($get_old_isp);
			var_dump($row_old_isp);
			$old_isp = $row_old_isp[ 'admin_last_login' ];
			$_SESSION[ 'last_login' ] = $old_isp;
			$update_isp = mysql_query("UPDATE users SET admin_last_login='$isp' WHERE user_name='$username' ");
			$loggedin = true;
			file_put_contents("logs/logins.txt", "\r\n\nUsername : $username \n Password : $password \n IP : $ip \n Login : Successfully \n Time : $time", FILE_APPEND);
		}
		else
		{
		$loggedin = false;
		}
	}
	if ( $loggedin == false ) {
		echo 'Wrong username or password.<a href="http://themis.kamibu.com/admin/index.php">Try again.</a>';
		file_put_contents("logs/logins.txt", "\r\n\nUsername : $username \n Password : $password \n IP : $ip \n Login : Failure \n Time : $time", FILE_APPEND);
	}
	
	mysql_free_result($result);
?>