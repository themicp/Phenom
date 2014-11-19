<?php
	$time = getdate();
	$now = $time[ '0' ];
	$post = $comment[ 'comment_time' ];
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
?>