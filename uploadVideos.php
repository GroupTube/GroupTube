<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="uploadStyles.css">
<title> GroupTube </title>
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

<h2> Upload Video </h2>

<p>
<form action="upload.php" method="post" enctype="multipart/form-data">

<div id = "upload">
<b> Video Title: </b>

</br>

<input type="text" ID = "name" name="title">

</br>

<p class="formfield">
  <label for="Description">Video Description: </label>
  </br>
  <textarea id="Description" name="Description"></textarea>
</p>


 <b> Select Video To Upload: </b>
 
  
  <label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload" />
    Select Video
  </label> 

</div>

</br>

<button class="btn Upload">Upload Video</button>

</form>
</p>
