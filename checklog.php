<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
if($eml=='Admin@gmail.com' and $pwd=='AdminAren')
{header("Location: disptb.php");}
else
{
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION["id"];
$sql = "SELECT id FROM login WHERE eml='$eml' and pwd='$pwd'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
	isset($_SESSION["id"]);
	$_SESSION["id"] = $id;
    header("Location: homepage.html");
}
else {
	$_SESSION["id"]=$id;
    header("Location: login.html");
}
 $conn->close();
}
?>