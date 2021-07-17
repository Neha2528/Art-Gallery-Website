<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
$id= $_SESSION["id"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM login WHERE eml='$eml' and pwd='$pwd'";

if ($conn->query($sql) === TRUE) {
    echo "Artist Record deleted successfully";
    $_SESSION["id"]=$id;
    header("Location: logout.php");

} else {
	$_SESSION["id"]=$id;
   header("Location: setting.html");
}
 $conn->close();
?>