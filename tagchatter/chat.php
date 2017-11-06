<?php

include 'functions.php';


$channel = $_REQUEST['channel'];

$messages = getJsons('https://tagchatter.herokuapp.com/channels/' . $channel . '/messages');

foreach($messages as $item) { 
	$content = $item['content'];
	$author = $item['author'];
	$name = $author['name'];
	$avatar = $author['avatar'];
	$time = $item['created_at'];
	
	$timestamp = strtotime($time);
	
	if (time() >= $timestamp) {
		echo 
		'		<div class="row message">' .
		'			<div class="col col-sm-1">' .
		'				<center><img class="chat-image rounded" src="' . $avatar . '" /></center>' .
		'			</div>' .
		'			<div class="col col-sm-11">' .
		'				<strong>' . $name . '</strong><img class="message-header-separator" src="images/message_header_separator.svg" alt="Message Header Separator" /><strong class="time">' . date('d/m/Y h:i', $timestamp) . '</strong><br/>' .
		'				<strong class="message-content">' . $content . '</strong>' .
		'			</div>' .
		'		</div>';
	} else {
		echo 
		'		<div class="row message">' .
		'			<div class="col col-sm-1">' .
		'				<center><img class="chat-image rounded" src="' . $avatar . '" /></center>' .
		'			</div>' .
		'			<div class="col col-sm-11">' .
		'				<strong>' . $name . '</strong><img class="message-header-separator" src="images/message_header_separator.svg" alt="Message Header Separator" /><strong class="time">' . date('H:i', $timestamp) . '</strong><br/>' .
		'				<strong class="message-content">' . $content . '</strong>' .
		'			</div>' .
		'		</div>';
	}
	

}
?>