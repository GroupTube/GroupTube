<?php
// Start the session
session_start();
?>


<?php

        //Variables
        $userName = "root";
        $password = "password";
        $databaseName ="GroupTube";
        
		$keyPhrase = $_POST['search'];
		$username = $_SESSION['username'];


        //create connection
        $conn = new mysqli("172.17.0.2", $userName, $password, $databaseName);

        // check connection
        if (mysqli_connect_errno())
        {

                echo    "Connection failed: " . mysqli_connect_errno();

        }
	//Increase the count of searches
	$update = mysqli_query($conn, "UPDATE Counts SET search  = search  + 1;");
       	
	if($username != "")
	{
	 //database items
        $result = mysqli_query($conn, " SELECT vidId, vidTitle, username, vidThumb FROM Videos WHERE vidTitle='$keyPhrase' AND username = '$username';");
        //get the data on the videos based on the search term(search term is very strict for the moment and only exact matches will be shown)
        if ($result->num_rows > 0)
        {
                       //Create an array for results
						$new_array=array();
						
						//Put all of the results into the array
						while($res = mysqli_fetch_row($result))
						{
						array_push($new_array, $res);
						}
						
                                //Set the session variable for later use
								$_SESSION["vids"] = $new_array;
				//Take to the search result page
				header("Location:searchResultsUser.php");
				
        }

        else
        {	//If no results display the no results html
		header("Location:noResults.html");
		

        }


        mysqli_close($conn);
	}
	else
		//Display no results html if there are no results
		header("Location:noResults.html");

?>
