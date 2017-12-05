<?php
// Start the session
session_start();
?>


<html>
<?php

        //Variables
        $userName = "root";
        $password = "password";
        $databaseName ="GroupTube";
        $keyPhrase = $_POST['search'];


        //create connection
        $conn = new mysqli("172.17.0.2", $userName, $password, $databaseName);

        // check connection
        if (mysqli_connect_errno())
        {

                echo    "Connection failed: " . mysqli_connect_errno();

        }
	//Increase visits to this page
	 $update = mysqli_query($conn, "UPDATE Counts SET search  = search  + 1;");


		//database items
	        $result = mysqli_query($conn, " SELECT vidId, vidTitle, username, vidThumb FROM Videos WHERE vidTitle='$keyPhrase';");
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
				//Take them to the search results page if there are results	
					include("searchResults.php");
        }

	//Take to no results page if there are none
        else
        {

		header("Location:noResults.html");
		exit;

        }


        mysqli_close($conn);

?>
</html>
