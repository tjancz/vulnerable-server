<?php
if(isset($_GET['msg'])){
    $file = fopen('clipboard.json', 'a+');
    fwrite($file, $_GET['msg'] . "\n");
    fclose($file);
}?>
<html>
<head>
    <title>Copy/Paste</title>
</head>
<body>
<pre><?php show_source("clipboard.json"); ?></pre>
</body>
</html>

