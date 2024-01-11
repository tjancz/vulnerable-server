<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,HEAD');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Ocp-Apim-Subscription-Key');

?>
<!DOCTYPE html >
<html>
<head>
<title>Content FORM</title>
</head>
<body id="body_bg">
<div <div align="center">

<h3>Show file content</h3>
</br>
<button onclick="testingAPI()"> Greetings</button>
<script>
function testingAPI(){
var key = "8a1c6a354c884c658ff29a8636fd7c18";
httpGet("http://janczewski.tech/path2.php",key);
var x = 0;
}

function httpGet(theUrl,key)
{
var xmlHttp = new XMLHttpRequest();

xmlHttp.open( "GET", theUrl, false ); 
xmlHttp.setRequestHeader("Ocp-Apim-Subscription-Key",key);
xmlHttp.send( null );
alert(xmlHttp.response);
}
</script>
		</div>
</body>
</html>
