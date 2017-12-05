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

//Get username and password from the user
$username = $_POST['username'];
$password = $_POST['password'];

//Set the session variable for later use
$_SESSION["username"] = $username;

//Update the counts for login and active for the performance data
$update = mysqli_query($conn, "UPDATE Counts SET login  = login  + 1;");
$update2 = mysqli_query($conn, "UPDATE Counts SET active  = active  + 1;");


//Make sure there is a user with matching password and username
$result = mysqli_query($conn, " SELECT password, Admin FROM Users  WHERE username = '$username';");

while($row = mysqli_fetch_array($result)) 
            {
                //put all availible data into an array
                $passwordHash = array("password"=>$row["password"]);
		$admin = array("Admin"=>$row["Admin"]);				 
		
            }
foreach($passwordHash as $hash)
{
//If there is and their inputted password matches the hashed password then
//Check if they are admin or not
if ($result->num_rows > 0 && password_verify($password, $hash))
        {
		foreach($admin as $ad)
                {
                            $isAd = $ad;
                }
		
		//If admin take to admin web interface
		if($isAd == "Yes")
		{
		    $_SESSION["admin"] = "Yes";	
		    header("Location:Admin.php");
		}
	       //Else take them to their user page
               else
		    header("Location:Userpage.php");
		
		exit;  

        }
//If the username or password isn't right 
//Take them to an error page
else
        {
                 header("Location:loginError.html");
   		 exit;
				
        }
}

?>

