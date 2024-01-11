<?php  
$connection = mysqli_connect("mysql", "root", "tiger","docker");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

if (isset($_GET['id'])){
	
// Assigning POST values to variables.
$username = $_GET['id'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE id='$username'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "Done!";

}else{
echo "Sorry!";
}
}
mysqli_close($connection);
?>