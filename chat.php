<?php
    include 'database.php';
	function str_replace_assoc($array,$string){
		$from_array = array();
		$to_array = array();
   
		foreach ($array as $k => $v){
			$from_array[] = $k;
			$to_array[] = $v;
		}
		return str_replace($from_array,$to_array,$string);
	}
	$getchatinfos = mysql_query("SELECT chat_id , chat_userid , chat_message FROM chat");
	while ($chatinfos = mysql_fetch_array($getchatinfos)) {
		$details1 = array('chat_message' => $chatinfos[ 'chat_message' ],
						  'chat_userid' => $chatinfos[ 'chat_userid' ]);
		$chatinfos1[ $chatinfos[ 'chat_id' ] ] = $details1;
	}
	krsort($chatinfos1);
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
	foreach ( $chatinfos1 as $chatid => $chatvalues ) {
        $chat_text1 = htmlspecialchars($chatvalues[ 'chat_message' ], ENT_QUOTES);
		$chat_text = str_replace_assoc($emoticons, $chat_text1);
		$useridforavtr = $chatvalues[ 'chat_userid' ];
		$getsenderchat = mysql_query("SELECT user_avatar, user_id , user_name FROM users WHERE user_id=$useridforavtr");
		$senderchat = mysql_fetch_array($getsenderchat);
		echo '<div class="chatmessage"><a href="http://themis.kamibu.com/?p=profile&user_id=' . $chatvalues[ 'chat_userid' ] . '"><div class="sender"><img src="avatars/';
		if ( $senderchat[ 'user_avatar' ] != "" ) {
			echo $senderchat[ 'user_avatar' ]; 
		}
		else if ( $senderchat[ 'user_avatar'] == "" ) {
			echo 'noimage.jpg';
		}
		echo '" width="60" height="60" class="senderimg" /></a></div><span class="says">' . $senderchat[ 'user_name' ] . ' έγραψε : </span><div class="newchat"><span class="newchattxt">'  . $chat_text . '</span></div></div><div style="clear:both"></div><br />';
	}
?>
