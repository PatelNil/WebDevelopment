
<?php
session_start();
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
$sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `bdate`, `gender`,`user_type` FROM `user` WHERE email='".$email."' AND password='".$pass."'";
$result = mysqli_query($conn, $sql); //$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) //if ($result->num_rows > 0)
{
	$row = mysqli_fetch_assoc($result);  //$row = $result->fetch_assoc()
	$_SESSION['id'] = $row['user_id'];
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['bdate'] = $row['bdate'];
	if ($row['user_type']==0){
		header("Location:index_admin.php");
	}else{
	header("Location:index.php");
}
}
else
	header("Location:login.php");
