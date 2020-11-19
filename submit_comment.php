<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'thinkwriteshare' ;
$id = $_POST['like'];
$comment = $_POST['comment'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "INSERT INTO comments(post_id,text) VALUES ('$id','$comment')";
if (mysqli_query($conn,$sql)){
    echo "<script>alert('Comment Posted')</script>";
    header("Location:index.php");
}else{
    echo 'unsucess';
}
?>