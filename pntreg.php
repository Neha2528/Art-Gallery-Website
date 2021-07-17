<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$imglink=$_POST['imglink'];
$title=$_POST['title'];
$type=$_POST['type'];
$cost=$_POST['cost'];
$id=$_SESSION['id'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO painting (imglink,title,type,cost,Aid)VALUES ('$imglink', '$title', '$type','$cost','$id')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $_SESSION["id"]=$id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
}
 $conn->close();
?>