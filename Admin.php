<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<!-- CSS for the layout of this page -->
<link rel="stylesheet" href="adminStyles.css">
<title> GroupTube </title>

<!-- Javascript to refresh the page after 5 minutes -->
<script type="text/javascript">
function load()
{
setTimeout("window.open(self.location, '_self');", 300000);
}
</script>
<body onload="load()">
</head>
<body>

<!-- Put logo in top left corner -->
<h1> <div id="top-left"> <a href="index.php"><img src="loginimage.jpg" alt="GroupTube Icon" height="60" width="60" id = "icon"></a> GroupTube </div>

<!-- Verify if this is a regular user, an admin user, or guest -->
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


//Display the name and image depending on what type of user they are in the top right hand cornor
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
<h2> Admin Web Interface: Performance Monitor </h2>

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

//Get all the website counts from the database
$result = mysqli_query($conn, " SELECT *  FROM Counts;");

//Put all of these counts into variables
while($row = mysqli_fetch_array($result))
            {
                $pageVisitsLogin = $row["login"];
                $pageVisitsCreate = $row["createN"];
		$pageVisitsWatch = $row["watch"];
                $pageVisitsSearch = $row["search"];
		$pageVisitsUploads = $row["upload"];
                $activeUsers = $row["active"];

            }



//Gets the CPU performance in regards to amount of cores used
$exec_loads = sys_getloadavg();
$exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -1"));
$cpu = round($exec_loads[1]/($exec_cores + 1)*100, 0) . '%';
	
//Gets the RAM in percent of total used
$exec_free = explode("\n", trim(shell_exec('free')));	
$get_mem = preg_split("/[\s]+/", $exec_free[1]);
$mem = round($get_mem[2]/$get_mem[1]*100, 0) . '%';

//Print out all of the counts
echo "<p> Number of page visits for:  </p>";
echo "<p> Login page: " . $pageVisitsLogin. "</p>";
echo "<p> Create new user page: " . $pageVisitsCreate . "</p>";
echo "<p> Watch video page: " . $pageVisitsWatch . "</p>";
echo "<p> Search pages: " . $pageVisitsSearch. "</p>";
echo "<p> Upload page: " . $pageVisitsUploads. "</p>";
echo "<p> Number of current active users: " . $activeUsers . "</p>";
echo "<p> CPU used in percent of the cores used:  " . $cpu . "</p>";
echo "<p> RAM in percent of total used: " . $mem . "</p>";

?>



</body>
</html>
