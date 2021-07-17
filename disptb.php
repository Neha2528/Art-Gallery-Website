<!DOCTYPE html>
<html>
<head>
<title>Displaytb</title>
<style>
.main {
  max-width: 1000px;
  margin: auto;
}
.row {
  margin: 10px -16px;
}
.row,
.row > .column {
  padding: 8px;
}
.column {
  float: left;
  width: 33.33%;
  display: none;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.content {
  max-width: 500px;
border-radius: 20px;
margin: auto;
background: rgba(0,0,0,0.8);
  padding: 10px;
}
.content:hover {
 background-color: azure;
}
.show {
  display: block;
}
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}
input[type=submit]{
		width: 10%;
		box-sizing: border-box;
		padding: 10px 0;
		margin-top: 20px;
		outline: none;
		border:none;
		background: #60adde;
		opacity: 0.7;
		border-radius: 20px;
		font-size: 15px;
		color: #fff;
	}
	input[type=submit]:hover{
		background: #003366;
		opacity: 0.7;
	}
.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}	
*{
	margin: 0;
	padding: 0;
	font-family: verdana;
  box-sizing: border-box;
}

body{
	width: 100%;
	height: 100vh;
	background-image: url(tb.jpg);
	background-size: cover;
	padding: 20px;
}
h1{
	font-size: 60px;
 font-family: Monotype Corsiva;
 text-align: center;
}

</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
		<h1>Database Content</h1>
	<br><br><br>
<div class="main">
	<form action="" method="POST">
	<p><h3>Enter your Choice:</h3></p><br>
	<input type="radio" name="ch" value="Artist">Artist 
	<input type="radio" name="ch" value="Customer">Customer
	<input type="radio" name="ch" value="Painting">Painting
	<input type="radio" name="ch" value="Login">Login
	<input type="radio" name="ch" value="Chpnt">Interested people choice<br>
	<input type="submit" name="Display" value="Display">
	</form>
<div class="row">
<?php
$ch=$_POST["ch"];
if($ch == 'Painting'){
$sql = "SELECT * FROM painting";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column">
    <div class="content">
         Imglink: <?php echo  $rows["imglink"] ?><br>
         Title: <?php echo  $rows["title"] ?><br>
         Type: <?php echo  $rows["type"] ?><br>
      	 Cost: <?php echo  $rows["cost"] ?><br>
      	 Painting-Id: <?php echo  $rows["Pid"] ?><br>
      	 Artist-Id: <?php echo  $rows["Aid"] ?><br>
    </div>
  </div>
<?php
}
}
}
if($ch == 'Customer'){
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column">
    <div class="content">
         Customer-Id: <?php echo  $rows["Cid"] ?><br>
         Name: <?php echo  $rows["name"] ?><br>
         Email-Id: <?php echo  $rows["eml"] ?><br>
      	 Phone no.: <?php echo  $rows["phno"] ?><br>
      	 Gender: <?php echo  $rows["Gndr"] ?><br>
    </div>
  </div>
<?php
}
}
}
if($ch == 'Login'){
$sql = "SELECT * FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column">
    <div class="content">
         Login: <?php echo  $rows["eml"] ?><br>
         Password: <?php echo  $rows["pwd"] ?><br>
    </div>
  </div>
<?php
}
}
}
if($ch == 'Chpnt'){
$sql = "SELECT * FROM choicepaint";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column">
    <div class="content">
         Customer-Id: <?php echo  $rows["Cid"] ?><br>
      	 Painting-Id: <?php echo  $rows["Pid"] ?><br>
    </div>
  </div>
<?php
}
}
}
if($ch == 'Artist'){
$sql = "SELECT * FROM artist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column">
    <div class="content">
         Artist-Id: <?php echo  $rows["Aid"] ?><br>
         Name: <?php echo  $rows["name"] ?><br>
         Email-Id: <?php echo  $rows["eml"] ?><br>
      	 Phone no.: <?php echo  $rows["phno"] ?><br>
      	 Gender: <?php echo  $rows["Gndr"] ?><br>
    </div>
  </div>
<?php
}
}
}
 else {
    echo "<br><br><br>No Content";
}
$conn->close();
?>
</div>
</div>
</body>
</html>