<?php 
include 'functions.php';

$channels = getJsons('https://tagchatter.herokuapp.com/channels');
		
	foreach($channels as $item) { 
		$id = $item['id'];
		$name = $item['name'];
		
		echo
		'		<li>' .
		'			<a id="' . $id . '" class="channels" href="#" onclick=openChat("' . $id . '","' . $name . '");>' .
		'				<img class="channel-icon" src="images/channel_icon.svg" alt="Channel Icon" /> ' . $name .
		'			</a>' .
		'		</li>';
	}
?>