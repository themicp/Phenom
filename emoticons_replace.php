<?php
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
?>
