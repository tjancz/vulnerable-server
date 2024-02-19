<!DOCTYPE html >
<html>
<head>
    <title>MASHLOG LOGIN FORM</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<div
<div align="center">

    <h3>LOGIN FORM</h3>
    <?php
    echo "Login verification<br/>";
    $link = new MySQLi("mariadb", "scott", "tiger", "docker");

    if (isset($_POST['user']) and isset($_POST['pass'])) {

// Assigning POST values to variables.
        $username = $_POST['user'];
        $password = $_POST['pass'];

// CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `user` WHERE login='$username' and password='$password'";

        $result = $link->query($query);
        $count = $result->num_rows;

        if ($count == 1) {
            echo "Login Success";

        } else {
            echo "Login Failed";
        }
    }
    $link->close();
    ?>

    <form id="login-form" method="post" action="login.php">
        <table border="0.5">
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="pass" id="user_pass"></input></td>
            </tr>

            <tr>

                <td><input type="submit" value="Submit"/>
                <td><input type="reset" value="Reset"/>

            </tr>
        </table>
    </form>
</div>
</body>
</html>
