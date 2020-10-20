
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'thinkwriteshare';
$conn = mysqli_connect($servername, $username, $password, $dbname); //$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) //if ($conn->connect_error)
{
  die("Connection failed: " . mysqli_connect_error()); //die("Connection failed: " . $conn->connect_error);
}
$pass = $_POST['password'];
$email = $_POST['username'];
$sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `bdate`, `gender` FROM `user` WHERE email='".$email."' AND password='".$pass."'";
$result = mysqli_query($conn, $sql); //$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) //if ($result->num_rows > 0)
{
	$row = mysqli_fetch_assoc($result);  //$row = $result->fetch_assoc()
	header("Location:index.php?uid=" . $row['user_id'] . "&uname=" . $row['first_name'] . " " . $row['last_name'] );
}
else
	header("Location:login.php");
