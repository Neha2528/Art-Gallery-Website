<!DOCTYPE html>
<html>
<head>
<title>Artfolio</title>
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
background: rgba(216, 191, 216,0.8);
  padding: 10px;
}
.content:hover {
 background-color: lavender;
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
	background-image: url(paint.jpg);
	background-size: cover;
	padding: 20px;
}

nav{
	width: 100%;
	height: 87px;
	background-color: #0009;
	opacity: 0.9;
	line-height: 88px;
}

nav ul{
	float: right;
	list-style-type: none;
	margin-right: 30px;
} 
 
nav ul li{
	list-style-type: none;
	display: inline-block;
	transition: 0.8s all;
}

nav ul li a{
	text-decoration: none;
	color: #fff;
	padding: 30px;
	
}

nav ul li:hover{
	background-color: #f39d1a;
	
}

 ul li.active a{
 		background-color: #f39d1a;
}
.title{
	position: absolute;
	top: 20%;
	left: 50%;
	transform: translate(-50%,-50%);

}
.title h1{
	
	font-size: 60px;
 font-family: Monotype Corsiva;
}

</style>
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION["id"];
$_SESSION["id"] = $id;
?>
	<header>
	<div id="main">
		<nav>
		<img src="icon.jpg" width="86" height="86">
			<ul>
				<li><a href="Homepage.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li class="active"><a href="Paint.php">Artcart</a></li>
				<li><a href="setting.html">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	<div class="title">
		<h1>Artfolio</h1>
	</div>
	<br><br><br><br><br><center>
  <p>Please click on image of Painting which you are been interested in!</p><p>Give a genuine remark and proceed further...for process</p>
  <p style="color:red">Don't Forget to remember Painting-Id of each Painting given below...!</p></center>
  <br><br><br>
	<div class="main">
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('ModernArt')"> ModernArt</button>
  <button class="btn" onclick="filterSelection('Abstract')"> Abstract</button>
  <button class="btn" onclick="filterSelection('Warli')"> Warli</button>
</div>
<div class="row">
<?php
$sql = "SELECT * FROM painting";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
       
?>
  <div class="column <?php echo  $rows["type"] ?>">
    <div class="content">
     <a href="choice.html"><img src="/A/<?php echo  $rows["imglink"] ?>" alt="<?php echo  $rows["title"] ?>" style="height: 280px;width: 300px;"></a>
      <h4>Title: <?php echo  $rows["title"] ?></h4>
      <p>Type: <?php echo  $rows["type"] ?><br>
      	 Cost: <?php echo  $rows["cost"] ?><br>
      	 Painting-Id: <?php echo  $rows["Pid"] ?></p>
    </div>
  </div>
<?php
}
} else {
    echo "<br><br><br>No pics";
}
$conn->close();
?>
</div>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace("active", " ");
    this.className += " active";
  });
}
</script>
</div>
</header>
</body>
</html>