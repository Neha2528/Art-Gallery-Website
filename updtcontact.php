<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$eml=$_POST['eml'];
$phno=$_POST['phno'];
$id=$_SESSION['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE customer SET phno='$phno', eml='$eml' WHERE Cid='$id'";
$sql = "UPDATE login SET eml='$eml' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "New record update successfully. ";
    $_SESSION["id"]=$id;
    header("Location: choice.html");
} 

else {
    echo "Error:".$sql." <br>" . $conn->error;
     header("Location: updtcontact.html"); 
}
 $conn->close();
?>