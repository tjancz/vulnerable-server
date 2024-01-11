<!DOCTYPE html >
<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<div <div align="center">

<h3>LOGIN FORM</h3>
    <form id="login-form" method="post" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
		</div>
<?php  
$connection = mysqli_connect("mysql", "root", "tiger","docker");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE username='$username' and Password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "Login Credentials verified'";

}else{
echo "Invalid Login Credentials";
//echo "Invalid Login Credentials";
}
}
mysqli_close($connection);
?>
</body>
</html>