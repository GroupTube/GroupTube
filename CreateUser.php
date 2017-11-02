
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

//Get variables from the user
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

$_SESSION["username"] = $username;

//Check and see if someone already has that username
$result = mysqli_query($conn, " SELECT * FROM Users  WHERE username = '$username';");

//Make sure that password and username aren't blank, that password and reentered password are the same, and that no one has the same username
if($password != "" && $username != "" &&  $password == $repassword && $result->num_row ==0)
{
		//Insert that user and their password into the database
                $sql = "Insert INTO Users(username, password) VALUES ('$username', '$password');";
}
//If the user is added successfully, print a message
if ($sql != "" && $conn->query($sql) === TRUE)
{
	include("CreateUser.php");
}
//If the user isn't added successfully, print a message
else
{
include("createUserError.html");
}




?>


