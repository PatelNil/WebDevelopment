<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div >
<?php
  include 'navbar.php';
  session_start();
  date_default_timezone_set("Asia/Kolkata");
?>
</div>
<div style="margin:50px">
<?php
$id = $_SESSION['id'];
$post = $_POST['post'];
$date = date("Y-m-d");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'thinkwriteshare';
$conn = mysqli_connect($servername, $username, $password, $dbname); //$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) //if ($conn->connect_error)
{
  die("Connection failed: " . mysqli_connect_error()); //die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO post (user_id,text,likes,date) VALUES ('$id','$post',0,'$date')";
if(mysqli_query($conn,$sql)){
  $post_ = mysqli_insert_id($conn);
  $sql_ = "INSERT INTO like_dislike (post_id,like_count) VALUES ('$post_',0)";
  if(mysqli_query($conn,$sql_)){
    echo "<script>
    alert('Tweet success');
    </script>";
  }
}else{
  echo mysqli_error($conn);
  echo "<script>
  alert('Tweet unsuccess');
  </script>";
}
header('Location:index.php');
?>
</div>
</body>
</html>