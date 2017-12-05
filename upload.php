
<?php
	session_start();
	error_reporting(0);
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
	 $update = mysqli_query($conn, "UPDATE Counts SET upload  = upload + 1;");	
	 $vidTitle = $_POST['title'];
	 $vidDesc = $_POST['Description'];
	 
	 if(isset($_SESSION["username"]))
	 {
		  $username = $_SESSION["username"];
	
	$target_dir = "/var/www/html/videos/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	$vidFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	$video = $target_dir . escapeshellcmd($_FILES["fileToUpload"]["name"]);
	$cmd = "ffmpeg -i $video 2>&1";
	$second = 1;
	if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) 
	{
    $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
    $second = rand(1, ($total - 1));
	}
	
	$image = "/var/www/html/videos/thumbnails/" . $vidTitle  . ".jpg";
	$cmd = "ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
	$do = `$cmd`;
	
	if($username == "")
	{
		$check = false;
	}
	if($vidFileType == "mp4" && file_exists($target_file) == false)
	{ 

		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{
		
		$sql = "Insert INTO Videos(username, vidTitle, vidRef, vidThumb, vidLikes, vidDLikes, vidViews, vidDesc) VALUES ('$username', '$vidTitle', '$target_file', 'ref', 0, 0, 0, '$vidDesc');";
		
		if ($sql != "" && $conn->query($sql) === TRUE)
		{
        include("Userpage.php");
		}		
		else
		{
		echo "Error 1";
		//include("uploadError.html");
		}
		}
		else
		{
		echo $_FILES["fileToUpload"]["tmp_name"];
		echo "Error 2";
		//include("uploadError.html");
		}
    } 
	else 
	{	
		echo "Error 3";
		//include("uploadError.html");
   	 }
	}
	else  
	{	echo "Error 4";
		// include("uploadError.html");
    }
	 
?>

