<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<!-- //Title will need to be a variable from database -->
<title>

<?php

echo $_SESSION["username"] . "'s Page";
?>


</title>

<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<h1>
<div id="top-left"> <a href="index.html"><img src="loginimage.jpg" alt="GroupTube Icon" id = "icon"></a> GroupTube </div>
<div id="top-right"> <?php echo $_SESSION["username"] . "'s Page";?> </div>
</br>
</h1>



<div class = "topnav" id="myTopnav">
	<a href="index.html">Home</a>
	<a href="searchResults.html">Search</a>
	<a href="Userpage.php">My Profile</a>
</div>
<br>

<form>
	<input type="text" name ="searchResult"> <input type="submit" value= "Search"<br>
</form>

<span id="uploadedVideo">

</span>



</body>
</html>
