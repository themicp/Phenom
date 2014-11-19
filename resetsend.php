<?php
	$sended = false;
	$mailinput = false;
	include 'database.php';
	$mailreset = $_POST[ 'res_mail' ];
	$mailexist = true;
	if ( $mailreset != "" ){
		$getuserinfo = mysql_query("SELECT user_mail , user_name , user_password FROM users WHERE user_mail='$mailreset'");
		$userinfo = mysql_fetch_array($getuserinfo);
		if ( $userinfo != "" ) {
			$to      = $mailreset;
			$subject = 'Στοιχεία λογαριασμού στο Phenom.';
			$message = 'Τα στοιχεία του λογαριασμού σου:
			Ψευδώνυμο : ' . $userinfo[ 'user_name' ] . '
			Κωδικός : ' . $userinfo[ 'user_password' ] .  '
			Χρησιμοποίησε τα παραπάνω στοιχεία για να πραγματοποιήσεις μια είσοδο στην ιστοσελίδα από εδώ http://themis.kamibu.com .  ';
			mail($to, $subject, $message, $headers);
			$sended = true;
			$mailinput = true;
		}
		else {
			if ( $userinfo == "" ) {
				$mailinput = true;
				$mailexist = false;
			}
		}
	}
?>