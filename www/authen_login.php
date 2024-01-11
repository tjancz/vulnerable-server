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