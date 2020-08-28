<?php




	$body = $_POST;
	$data = json_decode($body);
	http_response_code(200); // Return 200 OK 
	echo $data;
	echo $body;
?>
