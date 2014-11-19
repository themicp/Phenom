<?php
	$time = getdate();
	$now = $time[ '0' ];
	$post = $inbox[ 'message_time' ];
	$secondsdiff = $now - $post;
	$minutespost = $post / 60;
	$minutesnow = $now / 60;
	$minutesdiff = $minutesnow - $minutespost;
	$hourspost = $minutespost / 60;
	$hoursnow = $minutesnow / 60;
	$hoursdiff = $hoursnow - $hourspost;
	$dayspost = $hourspost / 24;
	$daysnow = $hoursnow / 24;
	$daysdiff = $daysnow - $dayspost;
	$monthspost = $dayspost / 30;
	$monthsnow = $daysnow / 30;
	$monthsdiff = $monthsnow - $monthspost;
	$yearspost = $monthspost / 12;
	$yearsnow = $monthsnow / 12;
	$yearsdiff = $yearsnow - $yearspost;
	if ( $secondsdiff < 61 && $secondsdiff > 0.9 ) {
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $secondsdiff . ' δευτερόλεπτα</div></div>';
	}
	if ( $minutesdiff < 61 && $minutesdiff > 0.9  ) {
		$numbers = $minutesdiff;
		$getdot = '.';
		$pos = strpos($numbers, $getdot);
		$final = substr($numbers, 0, $pos);	
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $final . ' λεπτά</div></div>';
	}
	if ( $hoursdiff < 25 && $hoursdiff > 0.9 ) {
		$numbers = $hoursdiff;
		$getdot = '.';
		$pos = strpos($numbers, $getdot);
		$final = substr($numbers, 0, $pos);	
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $final . ' ώρες</div></div>';
	}
	if ( $daysdiff < 31 && $daysdiff > 0.9 ) {
		$numbers = $daysdiff;
		$getdot = '.';
		$pos = strpos($numbers, $getdot);
		$final = substr($numbers, 0, $pos);	
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $final . ' μέρες</div></div>';
	}
	if ( $monthsdiff < 13 && $monthsdiff > 0.9 ) {
		$numbers = $monthsdiff;
		$getdot = '.';
		$pos = strpos($numbers, $getdot);
		$final = substr($numbers, 0, $pos);	
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $final . ' μήνες</div></div>';
	}
	if ( $yearsdiff > 0.9 ) {
		$numbers = $yearsdiff;
		$getdot = '.';
		$pos = strpos($numbers, $getdot);
		$final = substr($numbers, 0, $pos);	
		echo '<div class="container_message"><div class="sentmessages">Πρός <a href="http://themis.kamibu.com/?p=profile&user_id=' . $reciever[ 'user_id' ] . '">' . $reciever[ 'user_name' ] . '</a> <a href="?p=message&id=' . $inbox[ 'message_id' ] . '"><span class="subject">"' . $inbox[ 'message_subject' ] . '"</span></a> πριν από ' . $final . ' χρόνια</div></div>';
	}
?>