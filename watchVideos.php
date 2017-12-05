<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="watchVideosStyles.css">
<title>
GroupTube
</title>
<head>
</head>
<body>
<h1> <div id="top-left"> <a href="index.php"><img src="loginimage.jpg" alt="GroupTube Icon" height="60" width="60" id = "icon"></a> GroupTube </div>

<?php
if(isset($_SESSION["username"]) == true)
{
$username = $_SESSION["username"];
}
else
{
	$username = "";
}


if(isset($_SESSION["admin"]) == true)
{
$admin = $_SESSION["admin"];
}
else
{
        $admin = "";
}


if($admin != "")
{
  echo "<div id='top-right'> <a href='Admin.php'><img src='Kitty.jpg' alt='User Icon' height='60' width='60' id = 'icon'></a> Admin </div>";
}

else if($username != "")
{
//Need to replace img src with user's image
echo "<div id='top-right'> <a href='Userpage.php'><img src='Kitty.jpg' alt='User Icon' height='60' width='60' id = 'icon'></a>" . $username . "</div>";
}
else
{
//This is if user is not logged in
echo "<div id='top-right'> <a href='login.html'><img src='loginimage.jpg' alt='User Icon' height='60' width='60' id = 'icon'></a> Guest User </div>";
}
?>
</br>
</br>
</h1>

</br>
<!--This is the cool bar Clay implemented  
Logout will need to change based on session variable username
<a href="login.html">Login</a> -->
<?php
		echo "<div class = 'topnav' id='myTopnav'>";
		
if($username != "")
{
       echo "<a href='index.php'>Home</a>";
       echo "<a href='search.php'>Search</a>";
       echo "<a href='Userpage.php'>My Profile</a>";
	   echo "<a href='logout.php'>Logout</a>";
}
else
{
	    echo "<a href='index.php'>Home</a>";
        echo "<a href='search.php'>Search</a>";
        echo "<a href='Userpage.php'>My Profile</a>";
		echo "<a href='login.html'>Login</a>";
}
echo "</div>";
?>
<br>

<p>
<form action="searchingVideos.php" method="post">
<div id="SearchBox">
<input type="text" name="search" placeholder="">
</div>
<br>
<button class="Search">Search</button>
</form>
</br>
</br>
</p>



<?php

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
  $update = mysqli_query($conn, "UPDATE Counts SET watch  = watch + 1;");   

if(isset($_GET['id']))
{
        $vidId = $_GET['id'];
		$toReplace = array(" class =");
		$replace = array("");
		$vidId = str_replace($toReplace, $replace, $vidId);
		
		//Performs the update
		mysqli_query($conn,"UPDATE Videos Set vidViews = vidViews + 1 WHERE vidId = '$vidId';");
		
		$result = mysqli_query($conn, "SELECT vidRef, vidTitle, username, vidViews, vidLikes, vidDLikes, vidDesc FROM Videos WHERE vidId = '$vidId';");


    while($row = mysqli_fetch_array($result))
            {
                //put all availible data into an array
                $filepath = array("vidRef"=>$row["vidRef"]);
                $Vidtitle = array("vidTitle"=>$row["vidTitle"]);
				$username = array("username"=>$row["username"]);
				$VidDesc = array("vidDesc"=>$row["vidDesc"]);
				$views = array("vidViews"=>$row["vidViews"]);
                $likes = array("vidLikes"=>$row["vidLikes"]);
				$Dlikes = array("vidDLikes"=>$row["vidDLikes"]);
            }

					
					 echo "<div id = 'videoPlayer'> <h2>" .$Vidtitle["vidTitle"] . "<h2>";
					 echo "<video width='700' height='400' controls> <source src='" . $filepath["vidRef"] . "'type='video/mp4'>Your browser does not support HTML5 video</video>";
					
					 echo "<p> By: " .$username["username"]. "</p>";
					

					 echo "<p> View Count: " . $views["vidViews"] . "</p>" ;
					
						
					 $total = $likes["vidLikes"] + $Dlikes["vidDLikes"];
					 
					 if($total == 0)
						 $average = 0;
					 else
						 $average = $likes["vidLikes"] / $total;
					 
					 echo "<p>  Rating: " . $average . "</p>" ;
					 echo "<p> Description: " . $VidDesc["vidDesc"] . "</p></div>";
					 
					

}
else {
    echo "Database error!";
}
?>

</body>
</html>

