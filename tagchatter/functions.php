<?php
	function getJsons($url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		$result = curl_exec($curl);
		curl_close($curl);

		$array = json_decode($result, true);
		return $array;
	}
	
	
	$user = getJsons('https://tagchatter.herokuapp.com/me');
	
	$userId = $user['id'];
	$userName = $user['name'];
	$userAvatar = $user['avatar'];
?>