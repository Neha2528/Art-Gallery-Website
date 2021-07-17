<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$id=$_SESSION["id"];
$pid=$_POST['pid'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO choicepaint (Pid,Cid)VALUES ('$pid', '$id')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $_SESSION["id"]=$id;
    header("Location: Paint.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
     header("Location: choice.html");
}
$conn->close();
?>