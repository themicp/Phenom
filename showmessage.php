<?php
	$myid = $_SESSION[ 'id' ];
	$getmessage = mysql_query("SELECT * FROM messages WHERE message_id=$messageid");
	$messageinfo = mysql_fetch_array($getmessage);
	if ( $messageinfo != "" ) {
		$senderid = $messageinfo[ 'message_sender' ];
		$recieverid = $messageinfo[ 'message_reciever' ];
		$getsenderinfo = mysql_query("SELECT user_name FROM users WHERE user_id=$senderid");
		$senderinfo = mysql_fetch_array($getsenderinfo);
		$getrecieverinfo = mysql_query("SELECT user_name FROM users WHERE user_id=$recieverid");
		$recieverinfo = mysql_fetch_array($getrecieverinfo);
		$emoticons = array(':P' => '<img src="emoticons/tongue.gif" />',
						':(' => '<img src="emoticons/sad.gif" />',
						':)' => '<img src="emoticons/happy.gif" />',
						':D' => '<img src="emoticons/teeth.gif" />',
						':@' => '<img src="emoticons/angry.gif" />',
						'(L)' => '<img src="emoticons/love.gif" />',
						':kiss:' => '<img src="emoticons/kiss.gif" />',
						':x' => '<img src="emoticons/x.gif" />',
						':music:' => '<img src="emoticons/music.gif" />',
						':cool:' => '<img src="emoticons/cool.gif" />',
						';)' => '<img src="emoticons/eye.gif" />',
						':cry:' => '<img src="emoticons/cry.gif" />',
						':duh:' => '<img src="emoticons/duh.gif" />',
						'0o' => '<img src="emoticons/0o.gif" />',
						':S' => '<img src="emoticons/confused.gif" />',
						':shy:' => '<img src="emoticons/shy.gif" />');
		function str_replace_assoc($array,$string){
			$from_array = array();
			$to_array = array();
   
			foreach ($array as $k => $v){
				$from_array[] = $k;
				$to_array[] = $v;
			}
   
			return str_replace($from_array,$to_array,$string);
		}
		$message_text = str_replace_assoc($emoticons, $messageinfo[ 'message_text' ]);
		if ( $senderid != $myid && $recieverid == $myid ) {
			echo '<div class="show_message"><span class="show_sender"><span class="show_label">Από : </span><a href="?p=profile&user_id=' . $senderid . '">' . $senderinfo[ 'user_name' ] . '</a></span><span class="show_subject"><span class="show_label">Θέμα : </span>' . $messageinfo[ 'message_subject' ] . '</span><span class="show_text"><span class="show_label">Κείμενο : </span><span id="show_text">' . $message_text . '</span></span></div>';
		}
		else {
			if ( $senderid == $myid ) {
				echo '<div class="show_message"><span class="show_sender"><span class="show_label">Πρός : </span><a href="?p=profile&user_id=' . $recieverid . '">' . $recieverinfo[ 'user_name' ] . '</a></span><span class="show_subject"><span class="show_label">Θέμα : </span>' . $messageinfo[ 'message_subject' ] . '</span><span class="show_text"><span class="show_label">Κείμενο : </span><span id="show_text">' . $message_text . '</span></span></div>';			
			}
		}
	}
	else {
		if ( $messageinfo == "" ) {
			echo "Αυτό το μήνυμα έχει διαγραφτεί.";
		}
	}
?>