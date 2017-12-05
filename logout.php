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

//Reset the session's username
$_SESSION["username"] = "";
$_SESSION["admin"] = "";

//Increase visits to this page
 $update = mysqli_query($conn, "UPDATE Counts SET active  = active  - 1;");

//Go to the screen saying log out was successful
header("Location:logout.html");

exit;


?>

