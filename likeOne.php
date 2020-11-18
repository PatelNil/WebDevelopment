<?php
  $cnt = $_POST['like']; 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = 'thinkwriteshare' ;
  $conn = mysqli_connect($servername, $username, $password, $dbname); //$conn = new mysqli($servername, $username, $password, $dbname);
  if (!$conn) //if ($conn->connect_error)
  {
    die("Connection failed: " . mysqli_connect_error()); //die("Connection failed: " . $conn->connect_error);
  }
  $sql = "UPDATE post SET likes=likes+1 WHERE post_id=".$cnt;
  if($result = mysqli_query($conn,$sql)){
    echo 'success';
  } else{
    echo 'not success';
  }
  header("Location:index.php");
?>