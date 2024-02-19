<?php
    session_start();
?>
<!DOCTYPE html >
<html>
<head>
    <title>CHAT LOGIN FORM</title>
</head>
<body id="body_bg">
<div <div align="center">

    <h3>CHAT LOGIN FORM</h3>
    <form id="login-form" method="post" action="czat_shack1.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>

                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>

            </tr>
        </table>
    </form>
</div>
</body>
</html>