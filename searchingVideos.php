<?php

	//Variables
	$serverName ="GroupTube";
	$userName = "";
	$password = "";
	$databaseName ="";
	$keyPhrase = "testVid";
	
	
	//create connection
	$conn = new mysqli($serverName, $userName, $password);

	// check connection
	if (mysqli_connect_errno()) 
	{
		
		echo	"Connection failed: " . mysqli_connect_errno();
	
	}
	
	//database items
	$result = mysqli_query($conn, "SELECT vidTitle,vidRef,vidDesc FROM vidTable WHERE vidTitle=$keyPhrase");
	
	//get the data on the videos based on the search term(search term is very strict for the moment and only exact matches will be shown)
	if ($result->num_rows >0)
	{
			while($row = mysqli_fetch_array($result)) 
			{
				//put all availible data into an array
				$vids[] = array("vidTitle"=>$row["vidTitle"],"vidTitle"=>$row["vidRef"],"vidTitle"=>$row["vidDesc"]);
			}
		
		echo	$vids;
		
	}
	
	else
	{
		

		echo	"no result";
		
	}
	
	
	mysqli_close($conn);

?>

