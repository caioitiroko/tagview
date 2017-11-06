<?php

include 'functions.php';


$message = $_REQUEST['message'];
$actualChannel = $_REQUEST['actualchannel'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://tagchatter.herokuapp.com/channels/" . $actualChannel . "/messages");
curl_setopt($ch, CURLOPT_POST, 1);

// in real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, 
			http_build_query(array('message' => $message,
								   'author_id' => $userId)));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

?>