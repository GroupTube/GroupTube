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
		
		echo	"Connection failed: " . mysqli_connect_errno();
	
	}
	
	//database items
	$result = mysqli_query($conn, " SELECT vidTitle,vidRef,vidDesc FROM Videos  WHERE vidTitle='$keyPhrase';");	
	//get the data on the videos based on the search term(search term is very strict for the moment and only exact matches will be shown)
	if ($result->num_rows >0)
	{
			while($row = mysqli_fetch_array($result)) 
			{
				//put all availible data into an array
				$vids[] = array("vidTitle"=>$row["vidTitle"],"vidRef"=>$row["vidRef"],"vidDesc"=>$row["vidDesc"]);
			}
		
		print("<pre>".print_r($vids,true)."</pre>");
		
	}
	
	else
	{
		

		echo	"no result";
		
	}
	
	
	mysqli_close($conn);

?>

