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

//Get variables from the user
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Set session variable for later use
$_SESSION["username"] = $username;

//Increase visits to this page
 $update = mysqli_query($conn, "UPDATE Counts SET createN = createN + 1;");

//Check and see if someone already has that username
$result = mysqli_query($conn, " SELECT * FROM Users  WHERE username = '$username';");

$num_rows = $result->num_rows;

//Make sure that password and username aren't blank, that password and reentered password are the same, and that no one has the same username
if($password != "" && $username != "" &&  $password == $repassword && $num_rows ==0)
{
				echo "true";
                //Insert that user and their password into the database
                $sql = "Insert INTO Users(username, password, Admin) VALUES ('$username', '$passwordHash', 'No');";
}

//If the user is added successfully, display their page
if ($sql != "" && $conn->query($sql) === TRUE)
{
	header("Location:Userpage.php");
        exit;
}

//If the user isn't added successfully, display an error message
else
{
	header("Location:createUserError.html");
	exit;
}




?>
