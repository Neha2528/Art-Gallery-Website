<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$reg=$_POST['reg'];
$uname=$_POST['uname'];
$eml=$_POST['eml'];
$pwd=$_POST['pwd'];
$name=$_POST['name'];
$phno=$_POST['phno'];
$Gndr=$_POST['Gndr'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($reg === 'Customer')
{
$sql = "INSERT INTO customer (uname,eml,pwd,name,phno,Gndr)VALUES ('$uname', '$eml', '$pwd','$name','$phno','$Gndr')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $_SESSION["id"]=$last_id;
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: register.html");
}
}
if($reg === 'Artist')
{
$sql = "INSERT INTO artist (uname,eml,pwd,name,phno,Gndr)VALUES ('$uname','$eml','$pwd','$name','$phno','$Gndr')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $_SESSION["id"]=$last_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    header("Location: Paintreg.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: register.html"); 
}
}
$conn->close();
?>