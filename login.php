<?php
// Start the session
session_start();
?>


<?php

//Variables
$userName = "root";
$password = "password";
$databaseName ="GroupTube";


//create connection
$conn = new mysqli("172.17.0.2", $userName, $password, $databaseName);

// check connection
if (mysqli_connect_errno())
{
      echo    "Connection failed: " . mysqli_connect_errno();

}

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION["username"] = $username;

$result = mysqli_query($conn, " SELECT * FROM Users  WHERE username = '$username' AND password = '$password';");
if ($result->num_rows > 0)
        {
             include("Userpage.php");

        }
else
        {
                include("loginError.html");
        }

?>

