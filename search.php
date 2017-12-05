<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="searchStyles.css">
<title>
GroupTube
</title>
<head>
<body>

<h1>
<div id="top-left"> <a href="index.php"><img src="loginimage.jpg" alt="GroupTube Icon" height="60" width="60" id = "icon"></a> GroupTube </div>


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
</p>

</body>
</html>
