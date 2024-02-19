<?php
if(isset($_GET['msg'])){
    $file = fopen('clipboard.json', 'a+');
    fwrite($file, $_GET['msg'] . "\n");
    fclose($file);
} else if(isset($_POST['clear_all'])) {
    if(strcmp($_POST['clear_all'],"yes") == 0) {
        $file = fopen('clipboard.json', 'w');
        fwrite($file, "\n");
        fclose($file);
    }
}?>
<html>
<head>
    <title>Copy/Paste</title>
</head>
<body>
<pre><?php show_source("clipboard.json"); ?></pre>
<form action="clipboard.php" method="post">
    <input type="hidden" name="clear_all" value="yes"/>
    <button type="submit" value="Clear all">Clear all</button>
</form>
</body>
</html>

