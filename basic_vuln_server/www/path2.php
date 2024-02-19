<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,HEAD');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Ocp-Apim-Subscription-Key');

$headers = apache_request_headers();

foreach ($headers as $header => $value) {
	if(strcmp($header,"Ocp-Apim-Subscription-Key")==0) {
	echo file_get_contents($value);
}    
} 

?>
