<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
$id=$_SESSION['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE login SET pwd='$pwd' WHERE eml='$eml'";
if ($conn->query($sql) === TRUE) {
    echo "New record update successfully. ";
    $_SESSION["id"]=$id;
    header("Location: login.html");
} 

else {
    echo "Error:".$sql." <br>" . $conn->error;
    header("Location: updtpsd.html"); 
}
 $conn->close();
?>